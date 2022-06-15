<ul>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('home') }}">
            Home
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('explore') }}">
            Explore
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('notifications') }}">
            Notifications
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('profile',auth()->user()) }}">
            Profile
        </a>
    </li>
    <li>
        <form
            action="{{ route('logout') }}"
            method="post">
            @csrf
            <button
                class="font-bold text-lg mb-4 block"
                type="submit">Logout
            </button>
        </form>
    </li>
</ul>
