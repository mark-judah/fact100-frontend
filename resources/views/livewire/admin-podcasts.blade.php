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
                        <p class="text-xl">{{session('name')}}</p>
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
                                <p class="p-3.5 font-bold text-3xl">All Podcasts</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-white "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>
                        <div class="px-10 pb-10">
                            <div class="p-3.5">
                                <a href="{{url('/admin-new-podcast')}}"
                                ><img class="w-10 h-10 fill-white "
                                      src="/assets/images/tab-new-svgrepo-com.svg"></a>
                            </div>
                            <div class="bg-white w-fit flex  p-5 rounded-3xl">

                                <table class="table-auto  text-gray-400 border-separate space-y-6 text-sm">
                                    <tbody>
                                    <?php
                                    $index = 0;
                                    $status = '';
                                    ?>
                                    <tr class=" rounded-3xl">
                                        <th class="px-4 py-2 ">#</th>
                                        <th class="px-4 py-2 ">Title</th>
                                        <th class="px-4 py-2 ">Details</th>
                                        <th class="px-4 py-2 ">Cover Photo</th>
                                        <th class="px-4 py-2 ">About & Audio</th>
                                        <th class="px-4 py-2 ">Posted By</th>
                                        <th class="px-4 py-2 ">Posted on</th>
                                        <th class="px-4 py-2 ">Last Edit</th>
                                        <th class="px-4 py-2 ">Actions</th>
                                    </tr>
                                    @foreach($podcasts as $podcast)
                                        <?php $index = $index + 1?>

                                        <tr class="lg:text-black">
                                            <td class="px-4 py-2  font-medium border">{{$index}}</td>
                                            <td class="px-4 py-2  font-medium border">{{$podcast['title']}}</td>
                                            <td class="px-4 py-2  font-medium border">
                                                <p>
                                                    {{$podcast['season']}} {{$podcast['episode']}} {{$podcast['category']}}
                                                    @if($podcast['status']=='Live')
                                                        <p class="text-green-600 bg-green-300 rounded-xl text-center p-0.5">{{$podcast['status']}}</p>
                                                    @else
                                                       <p class="text-red-600-600 bg-red-300 rounded-xl text-center p-0.5">{{$podcast['status']}}</p>
                                                    @endif
                                                </p>
                                            </td>

                                                <td class="px-4 py-2  font-medium border w-100 h-100"><img class="object-contain"
                                                        src="{{ url($url) }}uploads/podcast_covers/{{$podcast['cover_photo']}}">
                                                </td>
                                                <td class="px-4 py-2  font-medium border">
                                                    {{$podcast['about']}}
                                                    <audio id="Test_Audio" controls>
                                                        <source
                                                            src="{{ url($url) }}uploads/podcast_audio/{{$podcast['audio']}}"
                                                            type="audio/mp3">
                                                    </audio>
                                                </td>
                                                <td class="px-4 py-2  font-medium border">{{$podcast['posted_by']}}</td>
                                                <td class="px-4 py-2  font-medium border">{{date('F jS Y', strtotime($podcast['created_at']))}}</td>
                                                <td class="px-4 py-2  font-medium border">{{date('F jS Y', strtotime($podcast['updated_at']))}}</td>
                                                <td class="px-4 py-2  font-medium border">
                                                    <div class="flex flex-row justify-evenly">
                                                        <div>
                                                            <form action="/admin-edit-podcast" method="post">
                                                                @csrf
                                                                <input type="hidden" name="podcast_id"
                                                                       value="{{$podcast['id']}}">
                                                                <input type="hidden" name="posted_by"
                                                                       value="{{$podcast['posted_by']}}">
                                                                <input type="hidden" name="title"
                                                                       value="{{$podcast['title']}}">
                                                                <input type="hidden" name="season"
                                                                       value="{{$podcast['season']}}">
                                                                <input type="hidden" name="episode"
                                                                       value="{{$podcast['episode']}}">
                                                                <input type="hidden" name="category"
                                                                       value="{{$podcast['category']}}">
                                                                <input type="hidden" name="status"
                                                                       value="{{$podcast['status']}}">
                                                                <input type="hidden" name="cover_photo"
                                                                       value="{{$podcast['cover_photo']}}">
                                                                <input type="hidden" name="about"
                                                                       value="{{$podcast['about']}}">
                                                                <input type="hidden" name="audio"
                                                                       value="{{$podcast['audio']}}">

                                                                <button type="submit">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                        <div>
                                                            <form action="/admin-delete-podcast" method="post">
                                                                @csrf
                                                                <input type="hidden" name="post_id"
                                                                       value="{{$podcast['id']}}">
                                                                <input type="hidden" name="posted_by_id"
                                                                       value="{{$podcast['user_id']}}">
                                                                <input type="hidden" name="title"
                                                                       value="{{$podcast['title']}}">
                                                                <input type="hidden" name="season"
                                                                       value="{{$podcast['season']}}">
                                                                <input type="hidden" name="episode"
                                                                       value="{{$podcast['episode']}}">
                                                                <input type="hidden" name="category"
                                                                       value="{{$podcast['category']}}">
                                                                <input type="hidden" name="status"
                                                                       value="{{$podcast['status']}}">
                                                                <input type="hidden" name="cover_photo"
                                                                       value="{{$podcast['cover_photo']}}">
                                                                <input type="hidden" name="about"
                                                                       value="{{$podcast['about']}}">
                                                                <input type="hidden" name="audio"
                                                                       value="{{$podcast['audio']}}">

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

