<div id="comments">
    <div>

        <div class="p-6 sm:pl-12 sm:pr-14 sm:pb-5">
            <div class="box-decoration-slice bg-[#D9E2F8] rounded-2xl">
                <div class="pl-12 pb-5 sm:pb-5 pt-4">
                    <h1 class="text-3xl font-bold ">Add a comment</h1>
                </div>
                {{--for mobile--}}
                <form class="pl-6 sm:hidden" method="post" action="{{ url('/make-comment') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $blog['currentPost']['id'] }}">
                    <input type="hidden" name="slug" value="{{ $blog['currentPost']['slug'] }}">

                    <div class="px-10">
                        <input type="text" name="comment_by"
                               class="p-3 text-2xl text-black bg-white rounded-2xl font-thin"
                               placeholder="Name"  size="13" required="">
                    </div>
                    <div class="px-10 py-3">
                        <input type="text" name="comment"
                               class="p-3 text-2xl text-black bg-white rounded-2xl font-thin"
                               placeholder="Comment here...." size="13" required="">
                    </div>

                    <div class="px-10 pb-5">
                        <input type="submit"
                               class="p-4 text-3xl text-white font-thin bg-blue-900 w-100 rounded-2xl"
                               value="Send">
                    </div>
                </form>

                {{--for pc--}}
                <form class="pl-6 hidden sm:block" method="post" action="{{ url('/make-comment') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $blog['currentPost']['id'] }}">
                    <input type="hidden" name="slug" value="{{ $blog['currentPost']['slug'] }}">

                    <div class="pb-10 pl-12">
                        <input type="text" name="comment_by"
                               class="p-3 text-2xl text-black bg-white rounded-2xl font-normal"
                               placeholder="Name" size="70" required="">
                    </div>

                    <div class="pb-10 pl-12">
                        <input type="text" name="comment"
                               class="p-3 text-2xl text-black bg-white rounded-2xl font-normal"
                               placeholder="Comment here...." size="70" required="">
                    </div>

                    <div class="px-10 pb-5">
                        <input type="submit"
                               class="p-4 text-3xl text-white font-thin bg-blue-900 w-100 rounded-2xl"
                               value="Send">
                    </div>
                </form>
            </div>
        </div>
        @if (!count($comments) > 0)
            <div class="p-4 sm:p-12">
                <div class="box-border  bg-[#D9E2F8] rounded-2xl">
                    <p class="text-3xl p-6 font-thin">No comments on this blog.</p>
                </div>
            </div>
        @else
            @foreach ($comments as $data)
                <div class="p-3 sm:pl-12 sm:pr-14 pb-5">
                    <div class="box-border p-4 bg-[#D9E2F8] rounded-2xl">
                        <div class="flex flex-row ">
                            <div class="flex-col pl-3.5">
                                <p class="pl-3 pt-3.5 font-normal text-2xl">{{$data['comment_by']}} says</p>
                                <p class=" pl-3 text-gray-500 font-normal">{{date('F jS Y', strtotime($data['created_at']))}}</p>
                                <div class="pl-3">
                                    <div class="hidden sm:block">
                                        <svg width="1018" height="3" viewBox="0 0 1018 3" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <line x1="0.999017" y1="2.5" x2="1018" y2="0.500001"
                                                  stroke="black"/>
                                        </svg>
                                    </div>

                                    <div class="sm:hidden">
                                        <svg width="300" height="3" viewBox="0 0 1018 3" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <line x1="0.999017" y1="2.5" x2="1018" y2="0.500001"
                                                  stroke="black"/>
                                        </svg>
                                    </div>

                                </div>
                                <p class="pl-3 pt-3.5 text-3xl font-thin text-blue-900 pb-3.5">{{$data['comment']}}</p>

                            </div>
                        </div>

                    </div>
                </div>

            @endforeach
        @endif
    </div>
</div>
