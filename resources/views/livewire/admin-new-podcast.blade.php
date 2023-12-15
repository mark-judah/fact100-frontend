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
                                <p class="p-3.5 font-bold text-3xl">New Podcast</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-black "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>

                        <div class="px-10">


                            <div class="bg-white  p-5 rounded-3xl">
                                <div class="p-3.5 flex justify-end">

                                    <label for="submit-form" tabindex="0">
                                        <img class="w-10 h-10 fill-white "
                                             src="/assets/images/cloud-done-svgrepo-com.svg">
                                    </label>

                                </div>
                                <form id="new_podcast" class="w-full max-w-lg" action="/new-podcast" method="post"
                                      enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <div class="w-full">
                                        <div class="mb-6 w-full">
                                            <label for="podcast_title"
                                                   class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">Podcast
                                                Title</label>
                                            <input type="text" id="title"
                                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                   name="podcast_title"  placeholder="Podcast Title"
                                                   required="">
                                        </div>

                                        <div class="mb-6 w-full">
                                            <label for="podcast season"
                                                   class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">Podcast
                                                Season</label>
                                            <input type="text" id="season"
                                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                   name="podcast_season"  placeholder="Podcast Season"
                                                   required="">
                                        </div>

                                        <div class="mb-6 w-full">
                                            <label for="episode"
                                                   class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">Podcast
                                                Episode</label>
                                            <input type="text" id="title"
                                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                   name="podcast_episode" placeholder="Podcast Episode"
                                                   required="">
                                        </div>


                                        <div class="mb-6">
                                            <label
                                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                                for="grid-state">
                                                Podcast Category
                                            </label>
                                            <div class="relative">
                                                <select
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                    name="podcast_category" required="">
                                                    <option selected hidden>Tech</option>
                                                    <option>Tech</option>
                                                    <option>Politics</option>
                                                    <option>Relationships</option>
                                                    <option>Motivation</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <label
                                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                                for="grid-state">
                                                Post Status
                                            </label>
                                            <div class="relative">
                                                <select
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                    name="podcast_status" required="">
                                                    @if(session('status')==1)
                                                        <option selected hidden>Live</option>
                                                    @else
                                                        <option selected hidden>Pending</option>
                                                    @endif
                                                    <option>Live</option>
                                                    <option>Pending</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-6 w-full">
                                            <label for="podcast_about"
                                                   class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">Podcast
                                                About</label>
                                            <textarea type="text" id="about"
                                                      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                      name="podcast_about" required="">

                                            </textarea>
                                        </div>

                                        <div class="mb-6">
                                            <label
                                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                                for="grid-state">
                                               Podcast cover image
                                            </label>
                                            <div class="relative">
                                                <input
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                    type="file" name="podcast_thumbnail" required="">

                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <label
                                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                                for="grid-state">
                                                Podcast audio file
                                            </label>
                                            <div class="relative">
                                                <input
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                    type="file" name="podcast_audio" required="">

                                            </div>
                                        </div>
                                        <input type="submit" id="submit-form" class="hidden"/>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
</div>
