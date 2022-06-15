<x-app>
    <div>
        @forelse($users as $user)
            <a href="{{ $user->path() }}">
                <div class="mb-4 flex items-center">
                    <img src="{{ $user->avatar }}" alt="{{ $user->username }}" width="40" class="rounded-full mr-4">

                    <div>
                        <h4 class="font-bold">{{ $user->name }}</h4>
                    </div>
                </div>
            </a>
        @empty
            <p>There is no users yet !</p>
        @endforelse
    </div>
</x-app>