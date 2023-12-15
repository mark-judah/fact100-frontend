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
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
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
                                <p class="p-3.5 font-bold text-3xl">Stats</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-white "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-evenly">
                            <div class=" flex flex-col bg-white rounded-3xl">
                                <a href="/admin-subscribers">
                                <div class="p-10">
                                    <img class="w-12 h-12 mx-auto "
                                         src="/assets/images/reader-following-svgrepo-com.svg">
                                    <p class="text-center text-2xl">{{$stats['total_subscribers']}}</p>
                                    <p class="text-center text-2xl">Total Subscribers</p>
                                </div>
                                </a>
                            </div>
                            <div class=" flex flex-col bg-white rounded-3xl">
                                <a href="/admin-posts">
                                <div class="p-10">
                                    <img class="w-12 h-12 mx-auto" src="/assets/images/blog-svgrepo-com.svg">
                                    <p class="text-center text-2xl">{{$stats['total_posts']}}</p>
                                    <p class="text-center text-2xl">Total Blogs</p>
                                </div>
                                </a>
                            </div>

                            <div class="flex-col bg-white rounded-3xl">
                                <a href="/admin-likes">
                                <div class="p-10">
                                    <img class="w-12 h-12 mx-auto"
                                         src="/assets/images/big-like-svgrepo-com.svg">
                                    <p class="text-center text-2xl">{{$stats['total_likes']}}</p>
                                    <p class="text-center text-2xl">Total Likes</p>
                                </div>
                                </a>
                            </div>

                            <div class=" flex flex-col bg-white rounded-3xl justify-items-center">
                               <a href="/blog-comments">
                                   <div class="p-10 ">
                                       <img class="w-12 h-12 mx-auto" src="/assets/images/big-comment-svgrepo-com.svg">
                                       <p class="text-center text-2xl">{{$stats['total_comments']}}</p>
                                       <p class="text-center text-2xl">Total Comments</p>
                                   </div>
                               </a>
                            </div>


                        </div>

                        <div class="flex justify-evenly p-5">
                            <div class="shadow rounded p-4 border bg-white  w-1/2">
                                <livewire:most-popular-blogs/>
                            </div>
                            <div class="shadow rounded p-4 border bg-white  w-1/2">
                                <livewire:most-liked-posts/>
                            </div>
                        </div>

                        <div class="flex justify-evenly p-5">
                            <div class="shadow rounded p-4 border bg-white  w-1/2">
                                <livewire:views-per-category/>
                            </div>

                            <div class="shadow rounded p-4 border bg-white  w-1/2">
                                <livewire:readers-location-chart/>
                            </div>
                        </div>
                    </div>
            </div>

    </div>
</div>
