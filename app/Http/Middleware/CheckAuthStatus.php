<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAuthStatus
{
    private $statuscode;


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        $this->checkToken();
        if ($this->statuscode==401){
            return redirect('login');
        }
        $referer = $request->headers->get('referer');
        $array = explode('/', $referer);
        $route = array_reverse($array);
        if ($route[0]=='login' || $route[0]=='admin-dashboard' ||
            $route[0]=='login' || $route[0]=='admin-posts' ||
            $route[0]=='admin-new-post' ||$route[0]=='admin-edit-post' ||
            $route[0]=='admin-subscribers' ||$route[0]=='admin-messages' ||
            $route[0]=='admin-podcasts'|| $route[0]=='admin-new-podcast'||
            $route[0]=='admin-user-profile'|| $route[0]=='admin-edit-user-profile'||
            $route[0]=='admin-edit-profile'|| $route[0]=='admin-update-profile'||
            $route[0]=='admin-categories'|| $route[0]=='admin-new-category'||
            $route[0]=='admin-about-us' || $route[0]=='admin-essay-requests'
            || $route[0]=='blog-comments') {
            return $next($request);
        } else {
            return redirect('login');
        }
    }

    private function checkToken()
    {
         $APIURL = env("BACKEND_API_URL","");
        $guzzle = new Client(['base_uri' => $APIURL,'http_errors' => false,'verify' => false]);
        $endpoint ='currentUser';
        $raw_response = $guzzle->get($endpoint, [
            'headers' => [ 'Authorization' => 'Bearer ' . session('token') ],
        ]);
        $this->statuscode = $raw_response->getStatusCode();


    }
}
