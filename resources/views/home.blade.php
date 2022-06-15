<x-app>
    @include ('_publish-tweet-panel')

    @include('_timeline',compact('tweets'))
</x-app>
