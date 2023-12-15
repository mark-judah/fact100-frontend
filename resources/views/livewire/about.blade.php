<div>
    <div>
        @isset($about)
        <div
            class="px-3 sm:pl-32 sm:pr-24 pb-5  font-normal  flex flex-col  text-2xl sm:text-3xl">
            {!! $about[0]->content_body !!}</div>
        @endisset
    </div>
</div>
