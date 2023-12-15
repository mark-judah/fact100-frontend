<div>
    <div class="flex flex-row">
        @if ($showDiv)
            <div class="bg-[#B09CD9] h-auto w-1/5 flex flex-col">
                <div class="justify-center">
                    <p class="text-center text-2xl  p-3.5">Dashboard</p>
                </div>

                <div class="mx-auto">
                    <img class="rounded-full w-30 h-20 " src="{{$url.'uploads/avatars/'.session('avatar')}}">
                </div>

                <div class="mx-auto pt-2">
                    @if(@session('name') !== null)
                        <p class="">{{session('name')}}</p>
                        <h6 class="font-bold ">Author</h6>
                    @endif
                </div>
                <div class="flex flex-col pt-3">

                    <a href="/admin-dashboard">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/monitor-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Dashboard</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-posts">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/blog-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Blogs</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-podcasts">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/mic-microphone-podcast-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Podcasts</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-messages">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/envelope-line.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Messages</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-subscribers">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/reader-following-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Subscribers</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-categories">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/category-svgrepo-com.svg" class="w-7 h-7">
                            </div>
                            <div class="px-3.5">
                                <p>Blog Categories</p>
                            </div>

                        </div>
                    </a>

                    <a href="/blog-comments">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/big-comment-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Blog Comments</p>
                            </div>

                        </div>
                    </a>

                        <a href="/admin-essay-requests">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/request-changes-svgrepo-com.svg" class="w-6 h-6">

                            </div>
                            <div class="px-3.5">
                                <p>Essay Requests</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-about-us">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/blog-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>About Us</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-user-profile">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/user.svg" class="w-6 h-6">

                            </div>
                            <div class="px-3.5">
                                <p>User Profile</p>
                            </div>

                        </div>
                    </a>
                </div>


            </div>
        @endif
        @if ($showDiv)
            <div class="bg-[#CAB2FE] h-full w-4/5">
                @elseif(!$showDiv)
                    <div class="bg-[#CAB2FE] h-full w-full">
                        @endif

                        <div class="flex justify-between">
                            <div class="w-fit p-3.5">
                                <button type="button"
                                        wire:click="$toggle('showDiv')">
                                    <img class="w-8 h-8" src="/assets/images/hamburger-menu-svgrepo-com.svg">
                                </button>

                            </div>

                            <div>
                                <p class="p-3.5 font-bold text-3xl">All Blogs</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-white "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>

                        <div class="p-5">
                            @if (session()->has('error'))
                                <div class="bg-white font-thin rounded-2xl">
                                    <p class="p-5">{{ session('error') }}</p>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="bg-white font-thin rounded-2xl">
                                    <p class="p-5">{{ session('message') }}</p>
                                </div>
                            @endif


                        </div>

                        <div class="px-10 pb-10">
                            <div class="p-3.5">
                                <a href="{{url('/admin-new-post')}}"
                                ><img class="w-10 h-10 fill-white "
                                      src="/assets/images/tab-new-svgrepo-com.svg"></a>
                            </div>
                            <p class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                (The file size displayed is after the thumbnail is compressed,thumbnails less than 400kb are recommended.
                                Large thumbnails affect the sites performance.Editing the post and replacing the thumbnail with a png or
                                webp may allow for better compression. Landscape images scale better.When shared to whatsapp, only thumbnails that are
                                less than or equal to 300kb will show.)
                            </p>
                            <div class="bg-white flex justify-center p-5 rounded-3xl">

                                <table class="table-auto  text-gray-400 border-separate space-y-6 text-sm">
                                    <tbody>
                                    <?php
                                    $index = 0;
                                    ?>
                                    <tr class=" rounded-3xl">
                                        <th class="px-4 py-2 ">#</th>
                                        <th class="px-4 py-2 ">Title</th>
                                        <th class="px-4 py-2 ">Category</th>
                                        <th class="px-4 py-2 ">Views</th>
                                        <th class="px-4 py-2 ">Thumbnail</th>
                                        <th class="px-4 py-2 ">Status</th>
                                        <th class="px-4 py-2 ">Posted On</th>
                                        <th class="px-4 py-2 ">Last Edit</th>
                                        <th class="px-4 py-2 ">Posted By</th>
                                        <th class="px-4 py-2 ">Actions</th>
                                    </tr>
                                    @foreach($posts as $post)
                                        <?php $index = $index + 1?>
                                        <tr class="lg:text-black">
                                            <td class="px-4 py-2  font-medium border">{{$index}}</td>
                                            <td class="px-4 py-2  font-medium border">{{$post['title']}}</td>
                                            <td class="px-4 py-2  font-medium border">{{$post['category']}}</td>
                                            @if($visited_urls)
                                                <td class="px-4 py-2  font-medium border">{{count(array_keys($visited_urls, $post['slug']))}}</td>
                                            @endif
                                            <td class="px-4 py-2  font-medium border w-100 h-100"><img
                                                    src="{{ url($url) }}uploads/blog_thumbnails/{{$post['thumbnail']}}"
                                                    style="width: 120px; height: 80px">
{{--                                                <p class="text-gray-500 p-3">--}}
{{--                                                    {{number_format((float)(array_change_key_case(get_headers("$url/uploads/blog_thumbnails/".$post['thumbnail'],1))['content-length']/1024), 1, '.', '')--}}
{{--                                                    }}kb</p>--}}
                                            </td>
                                            @if($post['active']=='Live')
                                                <td class="px-4 py-2  font-medium border"><p
                                                        class="text-green-600 bg-green-300 rounded-xl text-center p-0.5">{{$post['active']}}</p>
                                                </td>
                                            @else
                                                <td class="px-4 py-2  font-medium border"><p
                                                        class="text-red-600-600 bg-red-300 rounded-xl text-center p-0.5">{{$post['active']}}</p>
                                                </td>
                                            @endif

                                            <td class="px-4 py-2  font-medium border">{{date('F jS Y', strtotime($post['created_at']))}}</td>
                                            <td class="px-4 py-2  font-medium border">{{date('F jS Y', strtotime($post['updated_at']))}}</td>
                                            <td class="px-4 py-2  font-medium border">{{$post['posted_by']}}</td>
                                            <td class="px-4 py-2  font-medium border">
                                                <div class="flex flex-row justify-evenly">
                                                    <div>
                                                        <form action="/admin-edit-post" method="post">
                                                            @csrf
                                                            <input type="hidden" name="post_id" value="{{$post['id']}}">
                                                            <input type="hidden" name="posted_by_id"
                                                                   value="{{$post['user_id']}}">
                                                            <input type="hidden" name="title"
                                                                   value="{{$post['title']}}">
                                                            <input type="hidden" name="category"
                                                                   value="{{$post['category']}}">
                                                            <input type="hidden" name="status"
                                                                   value="{{$post['active']}}">
                                                            <input type="hidden" name="thumbnail"
                                                                   value="{{$post['thumbnail']}}">
                                                            <input type="hidden" name="tags" value="{{$post['tags']}}">
                                                            <input type="hidden" name="blog_body"
                                                                   value="{{$post['blog_body']}}">

                                                            <button type="submit">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <div>
                                                        <form action="/admin-delete-post" method="post">
                                                            @csrf
                                                            <input type="hidden" name="post_id" value="{{$post['id']}}">
                                                            <input type="hidden" name="posted_by_id"
                                                                   value="{{$post['user_id']}}">

                                                            <button type="submit">
                                                                <i class="bi bi-archive-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
            </div>

    </div>
</div>

