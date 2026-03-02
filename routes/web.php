<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/administrator', function () {
//     return view('admin');
// });

//
Route::get('/', [CandidatoController::class, 'index'])->name('buscar');


Route::post('/importar', [CandidatoController::class, 'importar'])->name('importar');