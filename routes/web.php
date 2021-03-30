<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AlbumController::class, 'index'])->name('albums.index');

Route::get('/', [AlbumController::class, 'search'])->name('albums.search');

Route::resource('/albums', AlbumController::class);

Route::patch('/albums/{albumId}/tracks', [TrackController::class, 'updateOrStore'])->name('tracks.update');

Route::delete('/tracks/{id}', [TrackController::class, 'destroy'])->name('tracks.destroy');
