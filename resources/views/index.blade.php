@extends('layouts.layout')

@section('content')
    <main>
        <h1>Каталог музыкальных альбомов</h1>
        @include('includes.flash')
        @if (isset($search))
            @if(count($albums) > 0)
                {{ Breadcrumbs::render('albums.search', $search) }}
                @include('includes.table')
            @else
                <p class="results">По запросу '{{ $search }}' ничего не найдено</p>
                <p class="return"><a href="/">Вернуться на главную</a></p>
            @endif
        @else
            @include('includes.table')
            <div class="pagination">
                {{ $albums->links("pagination::bootstrap-4") }}
            </div>
        @endif
        <div class="button">
            <a href="{{ route('albums.create') }}" class="edit">Добавить новый альбом в каталог</a>
        </div>
    </main>
@endsection
