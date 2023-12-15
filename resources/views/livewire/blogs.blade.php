<div>
    @if(isset($posts_paginate))
        @if (!count($posts1['data']) > 0)
            <div class="p-12">
                <div class="box-border  bg-[#D9E2F8] rounded-2xl">
                    <p>No blog posts are availabe.</p>
                </div>
            </div>
        @else
            <div class="p-3.5 sm:grid sm:grid-cols-2 sm:gap-3 md:grid md:grid-cols-3">
                @foreach (array_chunk($posts1['data'],3) as $chunk)
                    @foreach ($chunk as $data)
                        <a href="{{ url('/blogs/' . $data['slug']) }}">
                            <div class="p-2 pb-8 sm:pl-10">
                                <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-[#6A80B5]">
                                    <img class="object-fill h-60 w-96 rounded-2xl"
                                         src="http://{{ $url }}/uploads/blog_thumbnails/{{ $data['thumbnail'] }}"
                                         alt="">
                                    <div class="text-center pt-3.5">
                                        <p class="text-2xl mb-2 font-normal ">{{$data['title']}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endforeach
            </div>


            <div class="flex justify-evenly items-center">
                <nav class="p-5" aria-label="Page navigation">
                    <ul id="my-scrollbar" class="w-fit flex snap-x overflow-x-auto self-center">
                        @foreach($posts_paginate->links as $post)
                            @if($post->url!=null && $post->label!=='pagination.next')
                                <li class="snap-align-none py-3">
                                    <div class="whitespace-nowrap text-2xl p-2">
                                        <form action="/page/{{$post->label}}" method="get">
                                            <input type="hidden" name="page"
                                                   value="{{$post->label}}">
                                            <button type="submit">
                                                <p>
                                                    {{$post->label}}</p>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>

        @endif
    @else
        <div class="p-3.5 sm:grid sm:grid-cols-2 sm:gap-3 md:grid md:grid-cols-3">
            @foreach (array_chunk($posts,3) as $chunk)
                @foreach ($chunk as $data)
                    <a href="{{ url('/blogs/' . $data['slug']) }}">

                       <div class="p-2 pb-8 sm:pl-10">
                                <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-[#6A80B5]">
                                    <img class="object-fill h-60 w-96 rounded-2xl"
                                     src="http://{{ $url }}/uploads/blog_thumbnails/{{ $data['thumbnail'] }}"
                                     alt="">
                                <div class="text-center pt-3.5">
                                    <p class="text-2xl mb-2 font-normal ">{{$data['title']}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>

        <div class="flex justify-evenly items-center">
            <nav class="p-5" aria-label="Page navigation">
                <ul id="my-scrollbar" class="w-fit flex snap-x overflow-x-auto self-center">
                    @for($i=1;$i<=$pages;$i++)
                        <li class="snap-align-none py-3">
                            <div class="whitespace-nowrap text-2xl p-2">
                            <form action="/page/{{$i}}" method="get">
                                <input type="hidden" name="page"
                                       value="{{$i}}">
                                <button type="submit">
                                    <p>
                                        {{$i}}</p>
                                </button>
                            </form>
                            </div>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>

    @endif
</div>
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
