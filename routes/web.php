<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CareController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SpecieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
})->name('/');

Route::get('/home', function() {
    return view('home');
})->name('home'); // rota para retornar a view home. /home é a URI

// rotas para o registro de animais
Route::get('/registrar/animais', [ClassController::class, 'index'])->name('animal.create.view'); // rota para retornar a view de cadastro de animal

Route::post('/animais', [AnimalController::class, 'store'])->name('animal.store');

// rotas para o registro de cuidados
Route::get('/registrar/cuidados', function() {
    return view('care.care_create');
})->name('care.create.view');

Route::post('/cuidados', [CareController::class, 'store'])->name('care.store');

// rotas para listagem de animais
Route::get('/animais', [AnimalController::class, 'index'])->name('animal.list');

// rotas para listagem de cuidados
Route::get('/cuidados', [CareController::class, 'index'])->name('care.list');

// rotas para atualização de animais
Route::get('/animais/{animal}', [AnimalController::class, 'show'])->name('animal.update.view');

Route::put('/animais/{animal}', [AnimalController::class, 'update'])->name('animal.update');

Route::delete('/animais/{animal}', [AnimalController::class, 'destroy'])->name('animal.destroy');

// rotas para atualização de cuidados
Route::get('/cuidados/{care}', [CareController::class, 'show'])->name('care.update.view');

Route::put('/cuidados/{care}', [CareController::class, 'update'])->name('care.update');

Route::delete('/cuidados/{care}', [CareController::class, 'destroy'])->name('care.destroy');

// Rotas para filtragem
Route::get('/filter-options', [SpecieController::class, 'index'])->name('filter.species');