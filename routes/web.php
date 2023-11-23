<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

route::get('/',[PagesController::class, 'fnIndex'])-> name('xInicio');


//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/saludo', function () {
    return "holas mundo desde laravel...";
});

Route::get('/galeria/{numero}', function ($numero) {
    return "imagen numero: " .$numero;}) -> where('numero', '[0-9]*');

route::view('/galeria', 'pagGaleria', ['valor'=> 15])-> name('xGaleria');
route::view('/lista', 'pagLista', ['valor'=> 15])-> name('xLista');
//route::view('/Inicio', 'pagInicio', ['valor'=> 15])-> name('xInicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
