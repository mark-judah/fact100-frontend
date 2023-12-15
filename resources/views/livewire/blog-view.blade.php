<div>
    @isset($blog)
        <div class="flex sm:justify-between items-center">
            <div class="p-3 sm:pl-32 sm:pt-10 flex flex-row items-center">
                @if(isset($blog['avatar']))
                    <img class="rounded-full object-contain w-20 h-20 "
                         src="{{$url.'uploads/avatars/'.$blog['avatar']}}">
                @else
                    <img class="rounded-full w-20 h-20"
                         src="/assets/images/user.svg">
                @endif
                <a href="/author/{{$blog['currentPost']['posted_by']}}">
                    <p class="pl-3 font-normal text-2xl hidden sm:flex">By {{ucwords($blog['currentPost']['posted_by'])}}</p>
                </a>
            </div>
            <div class="sm:hidden">
                <a href="/author/{{$blog['currentPost']['posted_by']}}">
                <p class="p-3 font-normal text-2xl">By {{ucwords($blog['currentPost']['posted_by'])}}</p>
                </a>
            </div>
            <div class="hidden sm:flex sm:pr-24 pt-10">
                <a href="#subscribe"><p class="bg-[#072772] rounded-3xl sm:h-20 sm:w-80 text-white text-3xl p-5 text-center font-normal">
                        Subscribe</p></a>
            </div>
        </div>

        <div>
            <p class="px-3 sm:pt-3.5 sm:pl-32 text-gray-500 sm:text-3xl font-normal">{{date('F jS Y', strtotime($blog['currentPost']['created_at']))}}</p>
        </div>

        <div>
            <p class="px-3 sm:pl-32 sm:pt-5 font-normal sm:text-2xl">Category: <span
                    class="font-normal">{{$blog['currentPost']['category'] }}</span>
                <span class="text-gray-500">| {{round($time)}} min read</span></p>
        </div>

        <div>
            <p class="p-3 sm:pl-32 sm:py-5 font-normal text-3xl sm:text-5xl text-[#072772] text-center">{{$blog['currentPost']['title']}}</p>
        </div>

        <div
            class="px-3 sm:pl-32 sm:pr-24 pb-5  font-normal  flex flex-col  text-2xl sm:text-3xl">
            {!! $blog['currentPost']['blog_body']!!}
        </div>

        <div class="px-3 sm:pl-32 sm:pr-24 pb-5 justify-items-center">
            <p><span class="font-normal">Tags: {!! $blog['currentPost']['tags']!!} </span></p>
        </div>
        <div class="flex flex-row px-3 sm:pl-32 sm:pr-24 pb-5 justify-items-start items-center">
            <div>
                <livewire:like/>
            </div>

            <div>
                <livewire:message-icon/>
            </div>
        </div>
{{--        <div class="px-3 sm:pl-32 sm:pr-24 pb-3 justify-items-center">--}}
{{--            <p class="font-normal">Share this:</p>--}}
{{--        </div>--}}

{{--        <div class="flex flex-row px-3 sm:pl-32 sm:pr-24 pb-5 justify-items-start">--}}
{{--            <div class="pr-7">--}}
{{--                <img class="w-6 h-6 fill-blue-900" src="/assets/images/twitter-svgrepo-com.svg">--}}
{{--            </div>--}}
{{--            <div class="pr-7">--}}
{{--                <img class="w-6 h-6 fill-blue-900" src="/assets/images/instagram-svgrepo-com.svg">--}}
{{--            </div>--}}
{{--            <div class="pr-7">--}}
{{--                <img class="w-6 h-6 fill-blue-900" src="/assets/images/facebook-svgrepo-com.svg">--}}
{{--            </div>--}}
{{--            <div class="pr-7">--}}
{{--                <img class="w-6 h-6 fill-blue-900" src="/assets/images/whatsapp-svgrepo-com.svg">--}}
{{--            </div>--}}
{{--            <div class="pr-7">--}}
{{--                <img class="w-6 h-6 fill-blue-900" src="/assets/images/link-svgrepo-com.svg">--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="flex justify-between px-3 sm:pl-12 sm:pr-24 py-3 ">
            @if(isset($blog['previousPost']))
                <a href="/blogs/{{$blog['previousPost']}}">
                    <div class="flex flex-row items-center">
                        <img class="w-6 h-6" src="/assets/images/left.svg">
                        <p class="text-[#695C69] text-xl">Previous Article</p>
                    </div>
                </a>
            @endif

            @if(isset($blog['nextPost']))
                <a href="/blogs/{{$blog['nextPost']}}">
                    <div class="flex flex-row items-center">
                        <p class="text-[#695C69] text-xl">Next Article</p>
                        <img class="w-6 h-6 " src="/assets/images/right.svg">

                    </div>
                </a>
            @endif

        </div>

        <div class="flex justify-between px-3 sm:pl-12 sm:pr-24 pt-3.5">
            @if(isset($blog['previousPost']))

                <a href="/blogs/{{$blog['previousPost']}}">
                    <div>
                        <p class="sm:text-3xl text-[#6A80B5] font-normal">{{ucfirst(str_replace("-", " ", $blog['previousPost']))}}</p>
                        <p class="sm:text-2xl text-[#6A80B5] font-normal italic">By {{$blog['previousPostPostedBy']}}</p>
                    </div>
                </a>
            @endif


{{--            <div class="px-3">--}}
{{--                <svg width="1" height="120" viewBox="0 0 1 203" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <line x1="0.5" y1="-4.40724e-10" x2="0.5" y2="203" stroke="#072772"/>--}}
{{--                </svg>--}}

{{--            </div>--}}

            @if(isset($blog['nextPost']))
                <a href="/blogs/{{$blog['nextPost']}}">
                    <div>
                        <p class="sm:text-3xl text-[#6A80B5] font-normal">{{ucfirst(str_replace("-", " ", $blog['nextPost']))}}</p>
                        <p class="sm:text-2xl text-[#6A80B5] font-normal italic">By {{$blog['nextPostPostedBy']}}</p>
                    </div>
                </a>
            @endif
        </div>

        <div class="p-3 sm:pl-12 sm:pr-24 pt-3.5">
            <div>
                <p class="text-blue-900 sm:text-3xl font-normal"><a
                        href="/category/{{$blog['currentPost']['category']}}">Other posts
                        in {{$blog['currentPost']['category']}} category >></a></p>
            </div>

        </div>

        <div class="p-3 sm:pl-12 sm:pr-24 sm:pb-6">
            <p class="text-blue-900 sm:text-3xl font-normal"><a href="/blogs">View all posts >></a></p>
        </div>
        <livewire:comments :blog="$blog"/>

    @endisset
</div>
