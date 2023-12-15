<div>
    <div class="bg-[#19367C] pt-4 sm:pt-10 pb-10">
        <div class="flex justify-center">
            <p class="text-white text-3xl sm:text-7xl font-normal p-2.5 sm-p-6">Join the community</p>
        </div>

        <div class="flex justify-center">
            <p class="text-white text-center p-2 sm:text-3xl font-normal pb-3">Subscribe with your email address to
                receive the latest blogs
                and updates</p>
        </div>

        <div class="flex justify-center">
            {{--for pc--}}
            <div class="hidden sm:block">
                <form id="subscribe" method="post" action="{{ url('/subscribe') }}">
                    @csrf
                    <div class="relative text-white">
                        <input type="search" name="email"
                               class="p-2 text-3xl text-white bg-[#6A80B5] pl-10"
                               placeholder="Email" size="25" required="">

                        <input type="submit" name="Subscribe"
                               class="p-2 text-3xl text-gray-700 bg-[#6A80B5]"
                               value="Subscribe">
                    </div>
                </form>
            </div>
            {{--for mobile--}}
            <div class="sm:hidden">
                <form id="subscribe" method="post" action="{{ url('/subscribe') }}">
                    @csrf
                    <div class="relative text-white">
                        <div class="flex flex row justify-between p-2">
                            <div class="p-1">
                                <input type="search" name="email"
                                       class="p-2  text-white bg-[#6A80B5] "
                                       placeholder="Email" size="20" required="">
                            </div>
                            <div class="p-1">
                                <input type="submit" name="Subscribe"
                                       class="p-2  text-gray-700 bg-[#6A80B5]"
                                       value="Subscribe">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-[#072772]">
        <div class="bg-blue-900 flex flex-col sm:hidden">
            <div>
                <p class="text-white font-normal text-xl p-1 text-center">"I read to live, I write to share their
                    life"</p>
                <p class="text-white font-normal text-xl p-1 text-center">~Jessie Winterspring</p>
            </div>


            <div class="p-3">
                <p class="text-white text-xl font-normal text-center">
                    &copy; 2022 Fact 100
                </p>

                <p class="text-white text-xl font-normal text-center">
                    All rights reserved
                </p>

{{--                <a href="mailto:info@fact100.com" class="pt-3">--}}
{{--                    <p class="text-white font-normal text-center">--}}
{{--                        info@fact100.com--}}
{{--                    </p>--}}
{{--                </a>--}}
            </div>


            <div class="flex justify-center p-5 items-center">
                <a href="https://www.instagram.com/_fact100/">
                    <div class="pr-3">
                        <img class="w-10 h-10 " src="/assets/images/instagram-footer-svgrepo-com.svg">
                    </div>
                </a>

                <a href="https://www.youtube.com/channel/UCXuK1cjM7brqKANekLk_jmQ/featured">
                    <div class="pr-3">
                        <img class="w-10 h-10 " src="/assets/images/youtube-svgrepo-com.svg">
                    </div>
                </a>


                <a href="mailto:info@fact100.com">
                    <div class="pl-3">
                        <img class="w-10 h-10" src="/assets/images/mail-svgrepo-com.svg">
                    </div>
                </a>
            </div>

        </div>

        <div class="bg-blue-900 flex justify-between hidden sm:flex">
            <p class="text-white text-2xl font-normal pt-10 pb-10 pl-10">"I read to live, I write to share their life"
                <br>
                ~Jessie Winterspring
            </p>

{{--            <a href="mailto:info@fact100.com">--}}
{{--                <p class="text-white text-2xl font-normal pt-10 pb-10 pr-10">--}}
{{--                    Email: info@fact100.com--}}
{{--                </p>--}}
{{--            </a>--}}

            <div class="text-white text-2xl font-normal pt-10 pb-10 pr-10">&copy; 2022 Fact 100
                <br>
                <p class="pl-5">All rights reserved</p>
            </div>

        </div>


        <div class="bg-blue-900 flex justify-between items-center pb-5 hidden sm:flex">
            <form class="pl-10" method="post" action="{{ url('/search') }}">
                @csrf
                <div class="relative text-white">
                          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <div><img class="w-6 h-6" src="/assets/images/search-svgrepo-com.svg"></div>
                            </button>
                          </span>
                    <input type="search" name="q"
                           class="p-2 pl-12 text-3xl text-white bg-[#6A80B5]"
                           placeholder="Search" required="" size="25">
                </div>
            </form>

            <div class="flex justify-center pr-10 items-center">
                <a href="https://www.instagram.com/_fact100/">
                <div class="pr-3">
                    <img class="w-10 h-10 " src="/assets/images/instagram-footer-svgrepo-com.svg">
                </div>
                </a>

                <a href="https://www.youtube.com/channel/UCXuK1cjM7brqKANekLk_jmQ/featured">
                    <div class="pr-3">
                        <img class="w-10 h-10 " src="/assets/images/youtube-svgrepo-com.svg">
                    </div>
                </a>


                <a href="mailto:info@fact100.com">
                    <div class="pl-3">
                        <img class="w-10 h-10" src="/assets/images/mail-svgrepo-com.svg">
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
