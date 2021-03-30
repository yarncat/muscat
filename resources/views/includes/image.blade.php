        @if($album->image_link && file_exists($album->image_link))
            <img src="{{ asset($album->image_link) }}" id="image" alt="{{ $album->title }}">
        @else
            <img src="{{ asset('img/default.jpg') }}" id="image" alt="{{ $album->title }}">
        @endif
        