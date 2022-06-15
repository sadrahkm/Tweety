@if(count($images = $tweet->images))
<div class="flex flex-1 my-4">
    @foreach($images as $image)
    <span class="m-2"><img src="{{ $image->path }}"></span>
    @endforeach
</div>
@endif
