<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\CheckAuthStatus;
use App\Http\Middleware\BlogVisitsLog;
use App\Http\Middleware\PageVisitsLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'throttle:40,1'], function () {
    Route::middleware([PageVisitsLog::class])->group(function () {
        Route::get('/', function () {
            return view('templates/home');
        });

        Route::get('/blogs', function () {
            return view('templates/blogs');
        });

        Route::get('/podcasts', function () {
            return view('templates/podcasts');
        });

        Route::get('/categories', function () {
            return view('templates/categories');
        });

        Route::get('/about-us', function () {
            return view('templates/aboutUs');
        });

        Route::get('/request-essay', function () {
            return view('templates/requestEssay');
        });

        Route::get('/contact-us', function () {
            return view('templates/contactUs');
        });

        Route::get('/services', function () {
            return view('templates/ourServices');
        });

        Route::get('/login', function () {
            return view('templates/loginView');
        })->name('login');
    });
        Route::post('/login-auth', [AuthController::class, 'login'])->name('login-auth');
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::post('/make-comment', [CommentController::class, 'makeComment']);
        Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
        Route::post('/send-message', [MessageController::class, 'contactUs']);
        Route::post('/request-quote', [EssayController::class, 'requestQuote']);
        Route::post('/search', [PostController::class, 'searchBlog']);
        Route::get('/category/{category}', [PostController::class, 'postsByCategory']);
        Route::get('/page/{label}', [PaginationController::class, 'paginateBlogs']);
        Route::get('/author/{author}', [AuthorController::class, 'getAuthor']);

    Route::middleware([CheckAuthStatus::class])->group(function () {
        Route::get('/admin-dashboard', function () {
            return view('templates/adminDashboard');
        });

        Route::get('/admin-posts', function () {
            return view('templates/adminPosts');
        });

        Route::get('/admin-podcasts', function () {
            return view('templates/adminPodcasts');
        });
        Route::get('/admin-about-us', function () {
            return view('templates/adminAboutUs');
        });
        Route::get('/admin-subscribers', function () {
            return view('templates/adminSubscribers');
        });
        Route::get('/admin-categories', function () {
            return view('templates/adminCategories');
        });
        Route::get('/blog-comments', function () {
            return view('templates/adminBlogComments');
        });
        Route::get('/admin-messages', function () {
            return view('templates/adminMessages');
        });
        Route::get(' /admin-essay-requests', function () {
            return view('templates/adminEssayRequests');
        });

        Route::get('/admin-user-profile', function () {
            return view('templates/adminUserProfile');
        });
        Route::get('/admin-new-post', function () {
            return view('templates/adminNewPost');
        });
        Route::get('/admin-edit-post', function () {
            return view('templates/adminEditPost');
        });
        Route::get('/admin-edit-podcast', function () {
            return view('templates/adminEditPodcast');
        });
        Route::get('/admin-edit-user-profile', function () {
            return view('templates/adminEditUserProfile');
        });
        Route::get('/admin-new-podcast', function () {
            return view('templates/adminNewPodcast');
        });

        Route::post('/admin-unsubscribe', [SubscriberController::class, 'UnSubscribe']);
        Route::post('/new-post', [PostController::class, 'newPost']);
        Route::post('/admin-update-post', [PostController::class, 'updatePost']);
        Route::post('/update-podcast', [PodcastController::class, 'updatePodcast']);
        Route::post('/new-podcast', [PodcastController::class, 'newPodcast']);
        Route::post('/admin-edit-post', [PostController::class, 'editPost']);
        Route::post('/admin-delete-post', [PostController::class, 'deletePost']);
        Route::post('/admin-edit-profile', [AuthController::class, 'editProfile']);
        Route::post('/admin-update-profile', [AuthController::class, 'updateProfile']);
        Route::post('/admin-edit-podcast', [PodcastController::class, 'editPodcast']);
        Route::post('/admin-new-category', [CategoryController::class, 'newCategory']);
        Route::post('/admin-edit-about', [AuthorController::class, 'editAbout']);
        Route::post('/image-upload', [PostController::class, 'imgUpload'])->name('admin_image_upload');
        Route::post('/about-image-upload', [AboutController::class, 'imgUpload'])->name('admin_about_page_image_upload');
        Route::post('/admin-edit-post-category-modal', [CategoryController::class, 'editModalCategory']);

    });


    Route::middleware([BlogVisitsLog::class])->group(function () {
        Route::get('/blogs/{slug}', [PostController::class, 'getSingleBlog'])->where('slug', '[A-Za-z0-9-_]+');
        //fix error on pages with {} in url, initially they give error 404
        Route::get('/page/blogs/{slug}', [PostController::class, 'getSingleBlog'])->where('slug', '[A-Za-z0-9-_]+');
        Route::get('/category/blogs/{slug}', [PostController::class, 'getSingleBlog'])->where('slug', '[A-Za-z0-9-_]+');
        Route::get('/author/blogs/{slug}', [PostController::class, 'getSingleBlog'])->where('slug', '[A-Za-z0-9-_]+');

    });
});
