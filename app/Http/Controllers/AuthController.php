<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'login';
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $statusCode = $raw_response->getStatusCode();
        if($statusCode==200){
            $auth = json_decode($response);
            session(['token' => $auth->token]);
            $user = $this->getCurrentUser();
            $userData = json_decode($user, true);
            session(['id' => $userData['id']]);
            session(['name' => $userData['name']]);
            session(['email' => $userData['email']]);
            session(['role' => $userData['role']]);
            if(array_key_exists('avatar',$userData)){
                session(['avatar' => $userData['avatar']]);
            }
            return redirect('/admin-dashboard');
        }
        if ($statusCode==401){
            session()->flash('error', 'Failed, the username or password is incorrect');
            return redirect('/login');
        }

    }

    public function getCurrentUser()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'currentUser';
        $token = session('token');
        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $response = $raw_response->getBody()->getContents();
        return $response;
    }

    public function editProfile(Request $request)
    {
        session(['profile_id' => $request->profile_id]);
        session(['profile_name' => $request->name]);
        session(['profile_email' => $request->email]);
        session(['profile_role' => $request->role]);
        session(['profile_avatar' => $request->avatar]);
        return redirect('/admin-edit-user-profile');
    }

    public function updateProfile(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", ""), 'verify' => false]);
        $endpoint = 'updateProfile';
        $token = session('token');
        $logged_in_userId=session('id');
        $data = [
            'multipart' => [
                'name' => 'avatar',
                'contents' => file_get_contents($request->file('avatar')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('avatar')->getClientOriginalExtension(),
            ],

            [
                'name' => 'data',
                'contents' => json_encode(
                    [
                        'logged_in_userId'=>$logged_in_userId,
                        'profile_id' => $request->get('profile_id'),
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'role' => $request->get('role'),
                    ]),
            ]

        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $podcasts = $raw_response->getBody()->getContents();
        dd($podcasts);

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');

    }
}
