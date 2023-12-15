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
                                <p class="p-3.5 font-bold text-3xl">All Subscribers</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-white "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>
                        <div class="px-10 pb-10">

                            <div class="bg-white flex justify-center p-5 rounded-3xl">
                                <table class="table-auto  text-gray-400 border-separate space-y-6 text-sm">
                                    <tbody>
                                    <?php
                                    $index = 0;
                                    $status = '';
                                    ?>
                                    <tr class="rounded-3xl">
                                        <th class="px-4 py-2 ">#</th>
                                        <th class="px-4 py-2 ">Email</th>
                                        <th class="px-4 py-2 ">Subscription Date</th>
                                        <th class="px-4 py-2 ">Actions</th>
                                    </tr>
                                    @foreach($subscribers as $subscriber)
                                        <?php $index = $index + 1?>
                                        <tr class="lg:text-black">
                                            <td class="px-4 py-2  font-medium border">{{$index}}</td>
                                            <td class="px-4 py-2  font-medium border">{{$subscriber['email']}}</td>
                                            <td class="px-4 py-2  font-medium border">{{date('F jS Y', strtotime($subscriber['created_at']))}}</td>
                                            <td class="px-4 py-2  font-medium border">
                                                <div>
                                                    <form action="/admin-unsubscribe" method="post">
                                                        @csrf
                                                        <input type="hidden" name="email"
                                                               value="{{$subscriber['email']}}">
                                                        <button type="submit" class="rounded-3xl bg-blue-900">
                                                            <p class="text-white p-3.5">Unsubscribe <span
                                                                    class="p-2"> <i
                                                                        class="bi bi-file-earmark-x-fill"></i></span>
                                                            </p>
                                                        </button>
                                                    </form>
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
