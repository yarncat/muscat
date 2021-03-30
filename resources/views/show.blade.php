@extends('layouts.layout')

@section('content')
    {{ Breadcrumbs::render('albums.show', $album) }}
    @include('includes.flash')
    <main class="main">
        <div class="left">
            @include('includes.image')
        </div>
        <div class="right min">
            <h2>{{ $album->title }}</h2>
            <h3>{{ $album->artist }}</h3>
            <p class="release"><span>Релиз: </span>{{ $album->getHumanReadableRelease($album->release) }}</p>
            <p class="label"><span>Лейбл: </span>{{ $album->label }}</p>
            <div class="tracks">
                <p class="tracklist">Трек-лист:</p>
                <ol>
                    @foreach($tracks as $track)
                    <li>{{ $track->track_title }} <span class="time">({{ $track->duration }})</span></li>
                    @endforeach
                </ol>
            </div>
            @auth
            <a href="{{ route('albums.edit', $album) }}" class="edit">Редактировать данные</a>
            <form action="{{ route('albums.destroy', $album) }}" method="post" style="display: inline-block;" onsubmit="return confirm('Точно удалить альбом?')">
                @csrf
                @method('delete')
                <button type="submit" class="delete">Удалить альбом</button>
            </form>
            @endauth
        </div>
    </main>
@endsection
