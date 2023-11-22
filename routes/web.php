<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}) -> name('xinicio');

Route::get('/saludo', function () {
    return "Hola mundo desde laravel...";
});

Route::get('/inicio', function () {
    return view('pagInicio');
}) -> name('xInicio');

Route::get('/galeria/{numero}', function ($numero) {
    return "imagen numero: " .$numero;
}) -> where('numero', '[0-9]+');

route::view('/galeria', 'pagGaleria', ['valer'=> 15])-> name('xGaleria');

Route::get('/lista', function () {
    return view('pagLista');
}) -> name('xLista');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
