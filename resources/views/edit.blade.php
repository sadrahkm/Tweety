<x-app>
    <form
        method="POST"
        action="{{ $user->path() }}"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name">
                Name
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                name="name"
                id="name"
                type="text"
                value="{{ $user->name }}"
                required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="username">
                Username
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                name="username"
                id="username"
                type="text"
                value="{{ $user->username }}">

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="avatar">
                Avatar
            </label>

            <div class="flex">
                <input
                    type="file"
                    name="avatar"
                    class="border border-gray-400 p-2 w-full"
                    id="avatar">

                <img
                    src="{{ $user->avatar }}"
                    alt="your avatar"
                    width="40">
            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="banner">
                Banner
            </label>

            <div class="flex">
                <input
                    class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="banner"
                    id="banner">
            </div>

            @error('banner')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email">
                Email
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                value="{{ $user->email }}"
                required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="description">
                Description
            </label>

            <textarea
                class="border border-gray-400 p-2 w-full"
                name="description"
                id="description">
                {{ $user->description }}
            </textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password">
                Password
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required>

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password_confirmation">
                Password Confirmation
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
</x-app>
