<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('albums.index'));
});

Breadcrumbs::for('albums.search', function ($trail, $search) {
    $trail->parent('home');
    $trail->push("Результаты поиска по запросу '$search':", route('albums.search', $search));
});

Breadcrumbs::for('albums.create', function ($trail) {
    $trail->parent('home');
    $trail->push('Создание карточки объекта', route('albums.create'));
});

Breadcrumbs::for('albums.show', function ($trail, $album) {
    $trail->parent('home');
    $trail->push($album->title, route('albums.show', $album));
});

Breadcrumbs::for('albums.edit', function ($trail, $album) {
    $trail->parent('albums.show', $album);
    $trail->push('Редактирование карточки объекта', route('albums.edit', $album));
});

Breadcrumbs::for('errors.404', function ($trail) {
    $trail->parent('home');
    $trail->push('Ошибка 404');
});
