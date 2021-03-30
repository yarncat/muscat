@extends('layouts.layout')

@section('content')
    <main class="page-not-found">
        {{ Breadcrumbs::render('errors.404') }}
        <h1 class="">Страница не найдена</h1>
        <img src="{{ asset('img/404.png') }}" alt="Page not found" class="page-not-found">
    </main>
@endsection
