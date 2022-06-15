<x-app>
    <section>
        <ul>
            @forelse($user->notifications as $notification)
                <li class="flex mb-5 {{ $notification->unread() ? 'bg-blue-100' : '' }} p-5 rounded-md">
                    <div class="flex-shrink-0">
                        <a href="{{ route('profile',$notification->data['id']) }}">
                            <img
                                    src="{{ $notification->data['avatar'] }}"
                                    alt=""
                                    class="rounded-full mr-2"
                                    width="50px"
                                    height="50px"
                            >
                        </a>
                    </div>
                    <div class="flex flex-1 flex-col">
                        <a href="{{ route('profile',$notification->data['id']) }}">
                            <span class="font-bold">{{ $notification->data['name'] }}</span>
                        </a>
                        <p>{{ $notification->data['message'] }}</p>
                    </div>
                </li>
{{--                @php($notification->markAsRead())--}}
            @empty
                <p>There is no notifications yet dear {{ $user->name }}</p>
            @endforelse
        </ul>
    </section>
</x-app>
