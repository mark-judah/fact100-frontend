<div class="flex flex-row items-center">

        <div class="pr-3 ">
            @if($like_status['result']=='like not found')
                <button wire:click="like()">
                    <img class="w-6 h-6 fill-white" src="/assets/images/plain-like-svgrepo-com.svg">
                </button>
            @else
                <button wire:click="like()">
                    <img class="w-6 h-6 fill-blue-900" src="/assets/images/like-svgrepo-com.svg">
                </button>
            @endif

        </div>

    <div>
        @if($like_status['likesCount']>0)
            <p class="pr-3 text-3xl">{{$like_status['likesCount']}}</p>
        @endif
    </div>



</div>
