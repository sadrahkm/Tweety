<x-app>
    <header class="relative">
        <img src="{{ $user->banner }}" alt="" class="mb-4 rounded-md h-56 w-full">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit',$user)
                    <a href="{{ route('edit',$user->id) }}"
                       class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                    >
                        Edit Profile
                    </a>
                @endcan
                @unless(current_user()->is($user))
                    <x-form-button :user="$user"></x-form-button>
                @endunless
            </div>
        </div>
        <p class="text-sm mb-6">
            {{ $user->description }}
        </p>
        <img src="{{ $user->avatar }}" alt=""
             class="absolute rounded-full" style="width: 150px; height: 150px; left: calc(50% - 75px); top: 138px;">


    </header>

    @include('_timeline',[
    'tweets' => $tweets,
    'user' => $user
    ])
</x-app>
