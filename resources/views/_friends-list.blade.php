<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Follows</h3>

    <ul>
        @forelse (auth()->user()->follows as $user)
            <li class="mb-4">
                <div class="flex items-center text-sm">
                    <a href="{{ route('profile',$user) }}">
                        <img
                            src="{{ $user->avatar }}"
                            alt="{{ $user->name }}"
                            class="rounded-full mr-2"
                            width="40px"
                            height="40px"
                        >
                    </a>
                    <a href="{{ route('profile',$user) }}">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>There is no friends</li>
        @endforelse
    </ul>
</div>
