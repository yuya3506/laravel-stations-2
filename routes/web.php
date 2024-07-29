<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/admin/movies', [MovieController::class, 'admin_index'])->name('movie.index');
Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/admin/movies/store', [MovieController::class, 'store']);
Route::get('/admin/movies/{id}/edit', [MovieController::class, 'edit'])->name('movie.movieEdit');
Route::patch('/admin/movies/{id}/update', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'destroy'])->name('movie.delete');