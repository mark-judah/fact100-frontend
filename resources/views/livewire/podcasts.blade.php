<div>
        @isset($podcast)
        @if (!count($podcast['data']) > 0)
            <div class="p-12">
                <div class="box-border  bg-[#D9E2F8] rounded-2xl">
                    <p class="text-3xl p-6">No podcasts are availabe.</p>
                </div>
            </div>
        @else
            <div class=" sm:grid sm:grid-cols-2">
                @foreach (array_chunk($podcast['data'],2) as $chunk)
                    @foreach ($chunk as $data)
                        <div class="p-10  w-full hidden sm:flex">
                            <a href="#"
                               class="flex flex-row  bg-white p-3.5 rounded-lg border ">
                                <img
                                    class="object-contain h-full rounded-t-lg  sm:h-auto sm:w-48 sm:rounded-none sm:rounded-l-lg"
                                    src="{{ url($url) }}uploads/podcast_covers/{{ $data['cover_photo'] }}" alt="">

                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h4 class="mb-2 text-2xl font-thin tracking-tight text-blue-900">
                                        {{$data['title']}}</h4>
                                    <p
                                        class="mb-2 text-xl tracking-tight text-gray-400">{{$data['category']}}</p>
                                    <h5 class="mb-2 text-2xl font-thin tracking-tight text-gray-900 dark:text-white">
                                        {{$data['season']}} {{$data['episode']}}</h5>
                                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-400">{{$data['about']}}</p>
                                    <div class="flex justify-center">
                                        <audio controls>
                                            <source src="{{ url($url) }}uploads/podcast_audio/{{$data['audio']}}" type="audio/mp3">
                                        </audio>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="p-10  w-full sm:hidden">
                            <a href="#"
                               class="flex flex-row  bg-white rounded-lg border ">
                                <div class="flex flex-col justify-between p-4 max-w-sm rounded-2xl overflow-hidden">
                                    <h4 class="mb-2 text-xl font-bold  tracking-tight uppercase text-center text-blue-900">
                                        {{$data['title']}}</h4>
                                    <img
                                        class="object-fill w-fit h-full rounded-t-lg  sm:h-auto sm:w-48 sm:rounded-none sm:rounded-l-lg"
                                        src="{{ url($url) }}uploads/podcast_covers/{{ $data['cover_photo'] }}" alt="">
                                    <p
                                        class="text-xl tracking-tight text-gray-400 p-2">{{$data['category']}}</p>
                                    <h5 class=" text-2xl font-thin tracking-tight text-gray-900 ">
                                        {{$data['season']}} {{$data['episode']}}</h5>
                                    <p class=" font-normal text-gray-900 dark:text-gray-400">{{$data['about']}}</p>
                                    <div class="flex justify-center">
                                        <audio controls>
                                            <source src="{{ url($url) }}uploads/podcast_audio/{{$data['audio']}}" type="audio/mp3">
                                        </audio>
                                    </div>

                                </div>
                            </a>
                        </div>

                    @endforeach
                @endforeach
            </div>
            <div class="flex justify-end">
                <p class="text-3xl font-thin p-5"><a href="{{$podcast['next_page_url']}}">Older Posts ></a></p>
            </div>
        @endif
    @endisset

</div>
