@extends('layouts.layout')

@section('content')
    <main>
        {{ Breadcrumbs::render('albums.create') }}
        <div class="album">
            <div class="left">
                <img src="{{ asset('img/default.jpg') }}" id="image" alt="cover">
            </div>
            <div class="right">
                <div class="tabs">
                    <input type="radio" name="tab" id="tab-1" checked>
                    <label  for="tab-1">Общие данные</label>
                    <input type="radio" name="tab" id="tab-2" disabled>
                    <label for="tab-2">Трек-лист</label>
                    <div class="info" id="info">
                        <form action="{{ route('albums.store') }}" method="post" class="create" enctype="multipart/form-data">
                            @csrf
                            @include('includes.album_inputs')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/image.js') }}"></script>
@endpush
