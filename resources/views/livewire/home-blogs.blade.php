<div>
    @if (isset($posts))
        <div class="p-3.5 sm:grid sm:grid-cols-2 sm:gap-3 md:grid md:grid-cols-3">
            @foreach (array_chunk($posts,3) as $chunk)
                @foreach ($chunk as $data)
                    <a href="{{ url('/blogs/' . $data['slug']) }}">
                        <div class="p-2 pb-8 sm:pl-10">
                            <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-[#6A80B5]">
                                <img class="object-fill h-60 w-96 rounded-2xl"
                                     src="http://{{ $url}}/uploads/blog_thumbnails/{{ $data['thumbnail'] }}"
                                     alt="">
                                <div class="text-center pt-3.5">
                                    <p class="font-normal text-2xl mb-2 ">{{$data['title']}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>

        <div class="p-5">
            <button class="outline outline-offset-2 outline-blue-500 text-3xl font-bold p-3"><a href="/blogs">Older Posts</a></button>
        </div>
    @else
        <div class="pl-12">
            <div class="box-border  bg-[#D9E2F8] rounded-2xl">
            <p>No blog posts are availabe.</p>
        </div>
        </div>
    @endif
</div>
