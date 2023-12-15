<style>

    #my-scrollbar::-webkit-scrollbar {
        width: 1em;
        height: 0.6em;
    }

    #my-scrollbar::-webkit-scrollbar-track {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    #my-scrollbar::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-color: #1E3A8A;
        outline: 2px solid slategrey;
    }
</style>
<div>
    <div class="flex justify-between items-center bg-blue-900 sm:bg-white">
        <div class="flex justify-start items-center">
            <div class="p-2">
                <a href="/"><img
                        class="sm:hidden md;block w-20 h-12  sm:w-40 sm:h-20 sm:pl-1.5 sm:pr-7 object-fit sm:object-cover"
                        src="/assets/images/logo-blue-bg.svg">
                    <img
                        class=" hidden sm:block w-20 h-12"
                        src="/assets/images/logo-white-bg.svg">
                </a>
            </div>
            <h1 class="text-xl pr-7 hidden sm:block"><a href="/about-us">ABOUT US</a></h1>
            <h1 class="text-xl pr-7 hidden sm:block"><a href="/blogs">BLOGS</a></h1>
            <h1 class="text-xl pr-7 hidden sm:block"><a href="/services">OUR SERVICES</a></h1>
            <h1 class="text-xl pr-7 hidden sm:block"><a href="/request-essay">REQUEST ESSAY</a></h1>
            <h1 class="text-xl pr-7 hidden sm:block"><a href="/contact-us">CONTACT US</a></h1>
        </div>


        <div class="sm:hidden flex flex row justify-between">
            <button onclick="myFunction()" type="button">
                <div>
                    <img class="w-12 h-12 p-2" src="/assets/images/search-svgrepo-com.svg">
                </div>
            </button>
            <div>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" type="button">
                    <img class="w-12 h-12 p-2" src="/assets/images/hamburger-menu-white-svgrepo-com.svg">
                </button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden  divide-y divide-gray-100 rounded shadow w-60">
                <ul class="py-1 text-2xl text-white" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="/" class="block px-4 font-thin py-2 bg-[#6A80B5]">Home</a>
                    </li>
                    <li>
                        <a href="/about-us" class="block px-4 font-thin py-2 bg-[#3B5998]">About Us</a>
                    </li>
                    <li>
                        <a href="/blogs" class="block px-4 font-t   hin py-2 bg-[#6A80B5]">Blogs</a>
                    </li>
                    <li>
                        <a href="/services" class="block px-4 font-thin py-2 bg-[#3B5998]">Our Services</a>
                    </li>
                    <li>
                        <a href="/categories" class="block px-4 font-thin py-2 bg-[#6A80B5]">Categories</a>
                    </li>
                    <li>
                        <a href="/request-essay" class="block px-4 font-thin py-2 bg-[#3B5998]">Request Essay</a>
                    </li>
                    <li>
                        <a href="/contact-us" class="block px-4 font-thin py-2 bg-[#6A80B5]">Contact Us</a>
                    </li>

                </ul>
            </div>

        </div>

        <div class="flex justify-end items-center hidden sm:flex">
            <div class=" ">
                <form method="post" action="{{ url('/search') }}">
                    @csrf
                    <div class="relative text-gray-600">
                          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                             <div><img class="w-6 h-6" src="/assets/images/search-svgrepo-com.svg"></div>

                            </button>
                          </span>
                        <input type="search" name="q"
                               class="py-2 text-xl text-white bg-[#D9E2F8] rounded-2xl pl-10"
                               placeholder="Search for blog" required="" size="25" required="">
                    </div>
                </form>
            </div>

            <div class="p-5">
                <div><a href="/categories"><img class="w-8 h-8" src="/assets/images/hamburger-menu-svgrepo-com.svg"></a>
                </div>

            </div>

        </div>

    </div>
    <div class="bg-blue-900 flex justify-between hidden sm:flex items-center">
        @if($posts)
            @if(array_key_exists(0,$posts))
                @if(array_reverse(explode('/', request()->url()))[1]=='blogs')
                    <a href="{{$posts[0]['slug']}}">
                @else
                <a href="blogs/{{$posts[0]['slug']}}">
                    @endif
                    <h1 class="text-white text-2xl p-5">
                        Latest Post : {{$posts[0]['title']}}</h1>
                </a>
                @endif


            @if(array_key_exists(1,$posts))
                @if(array_reverse(explode('/', request()->url()))[1]=='blogs')
                    <a href="{{$posts[1]['slug']}}">
                @else
                    <a href="blogs/{{$posts[1]['slug']}}">
                        @endif
                        <h1 class="text-white text-2xl p-5">Previous Post
                            : {{$posts[1]['title']}}</h1>
                    </a>
                @endif
            @endif

    </div>

    <div class="hidden sm:block">
        @if($categories)
            <ul id="my-scrollbar" class="w-full flex snap-x overflow-x-auto self-center">
                @foreach ($categories as $data)
                    <a href="/category/{{$data}}">
                        <li class="snap-align-none py-3"><p class="whitespace-nowrap text-2xl p-2">{{$data}}
                                | </p>
                        </li>
                    </a>
                @endforeach
            </ul>
        @endif
    </div>

    <div id="myDIV" class="pt-2 justify-center" style="display:none;">
        <form method="post" action="{{ url('/search') }}">
            @csrf
            <div class="relative text-gray-600 flex justify-items-center pl-5">
                <input type="search" name="q"
                       class="py-2 pl-10 text-xl text-white bg-[#D9E2F8] rounded-2xl font-normal"
                       placeholder="Search for blog" required="" size="18" required="">

                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    <div><img class="w-8 h-8" src="/assets/images/black-search.svg"></div>

                </button>
            </div>
        </form>

    </div>
    <div class="flex justify-center pt-4 sm:p-3">
        <a class="text-5xl  font-normal text-blue-900" href="/">FACT 100</a>
    </div>

    <div class="flex justify-center pt-4 sm:p-3">
        <p class="text-xl sm:text-3xl font-normal text-[#2E3E62] text-center">EXPLORE KNOWLEDGE BETTER</p>
    </div>

    <div class="p-5">
        @if (session()->has('error'))
            <div class="px-4 sm:px-10">
                <div class="bg-blue-900 text-white font-normal rounded-2xl">
                    <p class="p-5">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="px-4 sm:px-10">
                <div class="bg-blue-900 text-white font-normal rounded-2xl">
                    <p class="p-5">{{ session('message') }}</p>
                </div>
            </div>
        @endif
    </div>  
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
