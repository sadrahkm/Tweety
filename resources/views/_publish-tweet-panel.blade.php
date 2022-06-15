<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form
        method="POST"
        action="{{ route('tweet.store') }}"
        enctype="multipart/form-data">
        @csrf

        <textarea
            name="body"
            class="w-full p-5"
            placeholder="What's up doc?"
        ></textarea>

        <div class="border border-dashed border-gray-500 relative">
            <input
                name="images[]"
                type="file"
                multiple
                class="cursor-pointer relative block opacity-0 w-full h-5 p-20 z-50">
            <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                <h4>
                    Drop files anywhere to upload
                    <br/>or
                </h4>
                <p class="">Select Files</p>
            </div>
        </div>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="40px"
                height="40px"
            >

            <button
                type="submit"
                class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white"
            >
                Tweet!
            </button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
