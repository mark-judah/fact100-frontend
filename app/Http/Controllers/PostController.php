<?php

namespace App\Http\Controllers;

use App\Http\Livewire\AdminEditPost;
use App\Http\Livewire\BlogView;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Livewire\Livewire;

class PostController extends Controller
{


    public function getSingleBlog($slug)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'getSinglePost';
        $data = [
            'slug' => $slug
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $time=$this->getReadtime(json_decode($response, true));
        return view('templates.blogView', [
            'blog' => json_decode($response, true),
            'time'=>$time,
            'url'=>env("BACKEND_URL","")

        ]);
    }

    public function searchBlog(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'searchForBlog';
        $data = [
            'search_item' => $request->input('q')
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return view('templates.searchResults', ['blog' => json_decode($response, true)]);
    }

    public function newPost(Request $request)
    {
        $posted_by = session('name');
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'createPost';
        $token = session('token');
        $data = [
            'multipart' => [
                'name' => 'thumbnail',
                'contents' => file_get_contents($request->file('blog_thumbnail')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('blog_thumbnail')->getClientOriginalExtension(),
            ],
            [
                'name' => 'data',
                'contents' => json_encode(
                    [
                        'posted_by' => $posted_by,
                        'title' => $request->get('blog_title'),
                        'active' => $request->get('blog_status'),
                        'blog_body' => $request->get('blog_content'),
                        'category' => $request->get('blog_category'),
                        'tags' => $request->get('blog_tags'),
                    ]
                ),
            ]
        ];

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $statusCode = $raw_response->getStatusCode();
        if($statusCode==201) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect('/admin-new-post');
        }
        if($statusCode==403) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('error', $result['result']);
            return redirect('/admin-new-post');
        }

        $response = $raw_response->getBody()->getContents();

        dd(json_decode($statusCode,$response));
    }

    public function postsByCategory($category){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'getPostsByCategory';
        $data = [
            'category' => $category
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return view('templates.categoryView', [
            'category' => $category,
            'posts'=>json_decode($response, true),
        ]);
    }

    public function imgUpload(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'uploadBlogImage';
        $token = session('token');
        $data = [
            'multipart' => [
                'name' => 'blog_image',
                'contents' => file_get_contents($request->file('file')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('file')->getClientOriginalExtension(),
            ]
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return $response;
        dd(json_decode($response));
    }

    public function editPost(Request $request)
    {
        session(['post_id' => $request->post_id]);
        session(['posted_by_id' => $request->posted_by_id]);
        session(['title' => $request->title]);
        session(['category' => $request->category]);
        session(['thumbnail'=> $request->thumbnail]);
        session(['status' => $request->status]);
        session(['tags' => $request->tags]);
        session(['content' =>$request->blog_body]);

        return redirect('/admin-edit-post');
    }


    public function updatePost(Request $request)
    {
        $posted_by = session('name');
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'updatePost';
        $token = session('token');
        $logged_in_userId=session('id');
        $data = [
            'multipart' => [
                'name' => 'thumbnail',
                'contents' => file_get_contents($request->file('blog_thumbnail')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('blog_thumbnail')->getClientOriginalExtension(),
            ],
            [
                'name' => 'data',
                'contents' => json_encode(
                    [
                        'logged_in_userId'=>$logged_in_userId,
                        'post_id' => $request->get('post_id'),
                        'posted_by_id' => $request->get('posted_by_id'),
                        'posted_by' => $posted_by,
                        'title' => $request->get('blog_title'),
                        'active' => $request->get('blog_status'),
                        'blog_body' => $request->get('blog_content'),
                        'category' => $request->get('blog_category'),
                        'tags' => $request->get('blog_tags'),
                    ]
                ),
            ]
        ];

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $statusCode = $raw_response->getStatusCode();
        if($statusCode==201) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect('/admin-edit-post');
        }
        if($statusCode==403) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('error', $result['result']);
            return redirect('/admin-edit-post');
        }
        $response = $raw_response->getBody()->getContents();
        dd(json_decode($statusCode,$response));
    }

    public function deletePost(Request $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'deletePost';
        $token = session('token');
        $logged_in_userId=session('id');
        $data = [
            'logged_in_userId'=>$logged_in_userId,
            'post_id' => $request->get('post_id'),
            'user_id' => $request->get('posted_by_id'),
            'request_type'=>'single_post'
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $statusCode = $raw_response->getStatusCode();
        if($statusCode==200) {
            $result=json_decode($response, true);
            session()->flash('message', 'The post was deleted successfully');
            return redirect('/admin-posts');
        }
        if($statusCode==403) {
            $result=json_decode($response, true);
            session()->flash('error', $result['result']);
            return redirect('/admin-posts');
        }
        $response = $raw_response->getBody()->getContents();
        dd($statusCode,$response);
    }

    private function getReadtime($response)
    {
        $content=$response['currentPost']['blog_body'];
        $words_per_minute=250;
//        $clean_content = strip_shortcodes( $content );
        $clean_content = strip_tags( $content );
        $word_count = str_word_count( $clean_content );
        $time = ceil( $word_count / $words_per_minute );
        return $time;
    }
}
