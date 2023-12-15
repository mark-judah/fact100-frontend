<div>
    <div class="flex flex-row">
        @if ($showDiv)
            <div class="bg-[#CAB2FE] h-screen w-1/5 flex flex-col">
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
            <div class="bg-[#CAB2FE] h-auto w-4/5">
                @elseif(!$showDiv)
                    <div class="bg-[#CAB2FE] h-screen w-full pb-30">
                        @endif

                        <div class="flex justify-between">
                            <div class="w-fit p-3.5">
                                <button type="button"
                                        wire:click="$toggle('showDiv')">
                                    <img class="w-8 h-8" src="/assets/images/hamburger-menu-svgrepo-com.svg">
                                </button>

                            </div>

                            <div>
                                <p class="p-3.5 font-bold text-3xl">All Categories</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-black "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>

                        <div class="px-10">
                            @isset($categories)
                                @if (!count($categories) > 0)
                                    <div class="">
                                        <p>No Categories are availabe.</p>
                                    </div>

                                    <livewire:livewire-ui-modal/>
                                    <div class="p-3.5 sm:grid sm:grid-cols-2 gap-3">
                                        <button onclick="Livewire.emit('openModal', 'add-category-modal')">
                                            <div class="box-decoration-slice bg-white p-5 rounded-2xl">
                                                <p class="text-center font-thin">Add a new category</p>
                                            </div>
                                        </button>
                                @else
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
                                    <div class="px-10">
                                        <livewire:livewire-ui-modal/>
                                        <div class="p-3.5 sm:grid sm:grid-cols-2 gap-3">
                                            <button onclick="Livewire.emit('openModal', 'add-category-modal')">
                                                <div class="box-decoration-slice bg-white p-5 rounded-2xl">
                                                    <p class="text-center font-thin">Add a new category</p>
                                                </div>
                                            </button>
                                            @foreach (array_chunk($categories,2) as $chunk)
                                                @foreach ($chunk as $data)
                                                    <div class="p-2 ">
                                                        <div
                                                            class="sm:box-decoration-slice bg-white sm:p-5 rounded-2xl justify-between flex grid-cols-2 items-center">
                                                            <div>
                                                                <p class=" font-thin"> {{$data->category}}</p>
                                                            </div>
                                                            <div>
                                                                <button
                                                                    onclick='Livewire.emit("openModal", "admin-delete-category-modal", {{ json_encode(["category" => $data->category]) }})'>
                                                                    <i
                                                                        class="bi bi-pencil-square"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>

                                @endif
                            @endisset
                        </div>
                        </div>
                    </div>
            </div>

    </div>
</div>
