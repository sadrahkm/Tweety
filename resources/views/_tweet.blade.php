<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                    src="{{ $tweet->user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50px"
                    height="50px"
            >
        </a>
    </div>

    <div class="relative flex flex-1 flex-col">
        <a href="{{ $tweet->user->path() }}">
            <h5 class="font-bold mb-2">{{ $tweet->user->name }}</h5>
        </a>
        @can('delete',$tweet)
            <form class="absolute" style="top: 10px; right: 10px;" action="{{ route('tweet.delete', $tweet->id) }}"
                  method="post">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        @endcan
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
        <x-tweet-images :tweet="$tweet"></x-tweet-images>
        @auth
            <x-like-button :tweet="$tweet"/>
        @endauth
    </div>
</div>

