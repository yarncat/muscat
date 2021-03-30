@extends('layouts.layout')

@section('content')
    <main>
        {{ Breadcrumbs::render('albums.edit', $album) }}
        @include('includes.flash')
        <div class="album" data-id="{{ $album->id }}">
            <div class="left">
                @include('includes.image')
            </div>
            <div class="right">
                <div class="tabs">
                    <input type="radio" name="tab" id="tab-1" checked>
                    <label  for="tab-1">Общие данные</label>
                    <input type="radio" name="tab" id="tab-2" {{ isset($_COOKIE['tab']) ? 'checked' : '' }}>
                    <label for="tab-2">Трек-лист</label>
                    <div class="info" id="info">
                        <form action="{{ route('albums.update', $album) }}" method="post" class="create" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @include('includes.album_inputs')
                        </form>
                    </div>
                    <div id="tracklist">
                        <form action="{{ route('tracks.update', $album->id) }}" method="post" class="create" id="tracksForm">
                            @csrf
                            @method('patch')
                            @include('includes.track_inputs')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/image.js') }}"></script>
    <script src="{{ asset('js/inputs.js') }}"></script>
    <script src="{{ asset('js/update.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
