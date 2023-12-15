<div>
    <p class="text-3xl pl-10 hidden sm:block">Categories</p>
    <p class="text-3xl pl-10 text-center p-3 sm:hidden">Categories</p>
    <div class="px-10 hidden sm:block">
        <svg width="1300" height="3" viewBox="0 0 1345 3" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0.999262" y1="2.5" x2="1345" y2="0.516237" stroke="black"/>
        </svg>
    </div>
    @isset($categories)
        @if (!count($categories) > 0)
            <div class="">
                <p>No Categories are availabe.</p>
            </div>
        @else
            <div class="sm:px-10">
                <div class="p-3.5 sm:grid sm:grid-cols-2 gap-3">
                    @foreach (array_chunk($categories,2) as $chunk)
                        @foreach ($chunk as $data)
                           <div class="p-2">
                               <div class="sm:box-decoration-slice bg-[#D9E2F8] sm:p-5">
                                   <a href="/category/{{$data->category}}"><p class="text-2xl sm:text-4xl p-2 text-center font-normal"> {{$data->category}}</p></a>
                               </div>
                           </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

{{--            <div class="p-10 hidden sm:block">--}}
{{--                <div class="box-decoration-slice bg-[#D9E2F8] rounded-2xl">--}}
{{--                    <div class="pl-12 p-10">--}}
{{--                        <h1 class="text-3xl font-normal ">Request for an Essay</h1>--}}
{{--                    </div>--}}

{{--                    <form class="pl-10" method="post" action="{{ url('/search') }}">--}}
{{--                        @csrf--}}
{{--                        <div class="pb-10 ">--}}
{{--                            <input type="text" name="topic"--}}
{{--                                   class="p-5 pl-12 text-3xl text-black bg-white font-normal rounded-2xl"--}}
{{--                                   placeholder="Topic of an essay"  size="55">--}}
{{--                        </div>--}}

{{--                        <div class="pb-10 ">--}}
{{--                            <input type="email" name="email"--}}
{{--                                   class="p-5 pl-12 text-3xl text-black bg-white"--}}
{{--                                   placeholder="Email" required="" size="55">--}}
{{--                        </div>--}}

{{--                        <div class="pb-10 ">--}}
{{--                            <input type="submit"--}}
{{--                                   class="p-5 text-3xl text-white font-normal bg-blue-900 w-100 rounded-2xl"--}}
{{--                                   value="Submit">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="p-5 sm:hidden">--}}
{{--                <div class="box-decoration-slice bg-[#D9E2F8] rounded-2xl">--}}
{{--                    <div class="p-10">--}}
{{--                        <h1 class="text-3xl font-normal ">Request for an Essay</h1>--}}
{{--                    </div>--}}

{{--                    <form class="p-3.5" method="post" action="{{ url('/search') }}">--}}
{{--                        @csrf--}}
{{--                        <div class="pb-10 ">--}}
{{--                            <input type="text" name="topic"--}}
{{--                                   class="p-5 text-3xl text-black bg-white font-normal rounded-2xl"--}}
{{--                                   placeholder="Topic of an essay"  size="12">--}}
{{--                        </div>--}}

{{--                        <div class="pb-10 ">--}}
{{--                            <input type="email" name="email"--}}
{{--                                   class="p-5 text-3xl text-black bg-white font-normal rounded-2xl"--}}
{{--                                   placeholder="Email"  size="12">--}}
{{--                        </div>--}}

{{--                        <div class="pb-10 ">--}}
{{--                            <input type="submit"--}}
{{--                                   class="p-5 text-3xl text-white font-normal bg-blue-900 w-100 rounded-2xl"--}}
{{--                                   value="Submit">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}


        @endif
    @endisset
</div>
