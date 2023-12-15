<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PodcastController extends Controller
{


    public function newPodcast(Request $request)
    {
        $podcast_status = 0;
        $posted_by = session('name');
        if ($request->get('podcast_status') == "Pending") {
            $podcast_status = 0;
        } else {
            $podcast_status = 1;
        }
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'createPodcast';
        $token = session('token');
        $data = [

            [
                'name' => 'podcast_thumbnail',
                'contents' => file_get_contents($request->file('podcast_thumbnail')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('podcast_thumbnail')->getClientOriginalExtension(),
            ],

            [
                'name' => 'podcast_audio',
                'contents' => file_get_contents($request->file('podcast_audio')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('podcast_audio')->getClientOriginalExtension(),
            ],


            [
                'name' => 'data',
                'contents' => json_encode(
                [
                    'title' => $request->get('podcast_title'),
                    'about' => $request->get('podcast_about'),
                    'season' => $request->get('podcast_season'),
                    'episode' => $request->get('podcast_episode'),
                    'category' => $request->get('podcast_category'),
                    'status' => $request->get('podcast_status'),
                    'posted_by' => $posted_by,
                ]
            ),
            ]
        ];

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        dd(json_decode($response));
    }


    public function editPodcast(Request $request){
        session(['podcast_id' => $request->podcast_id]);
        session(['posted_by' => $request->posted_by]);
        session(['title' => $request->title]);
        session(['season' => $request->season]);
        session(['episode' => $request->episode]);
        session(['category' => $request->category]);
        session(['status' => $request->status]);
        session(['cover_photo'=> $request->thumbnail]);
        session(['about' => $request->about]);
        return redirect('/admin-edit-podcast');
    }

    public function updatePodcast(Request $request)
    {
        $podcast_status = 0;
        if ($request->get('podcast_status') == "Pending") {
            $podcast_status = 0;
        } else {
            $podcast_status = 1;
        }
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'updatePodcast';
        $token = session('token');
        $data = [

            [
                'name' => 'podcast_thumbnail',
                'contents' => file_get_contents($request->file('podcast_thumbnail')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('podcast_thumbnail')->getClientOriginalExtension(),
            ],

            [
                'name' => 'podcast_audio',
                'contents' => file_get_contents($request->file('podcast_audio')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('podcast_audio')->getClientOriginalExtension(),
            ],


            [
                'name' => 'data',
                'contents' => json_encode(
                    [
                        'title' => $request->get('podcast_title'),
                        'about' => $request->get('podcast_about'),
                        'season' => $request->get('podcast_season'),
                        'episode' => $request->get('podcast_episode'),
                        'category' => $request->get('podcast_category'),
                        'status' => $request->get('podcast_status'),
                        'posted_by' => $request->get('posted_by'),
                        'podcast_id'=>$request->get('podcast_id'),
                    ]
                ),
            ]
        ];

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        dd(json_decode($response));
    }

}
