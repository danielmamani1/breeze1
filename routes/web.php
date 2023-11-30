<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

route::get('/',[PagesController::class, 'fnIndex'])-> name('xInicio');
route::get('/detalle/{id}',[PagesController::class, 'fnEstDetalle'])-> name('Estudiante.xDetalle');
Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') -> name('xGaleria');
Route::get('/lista', [PagesController::class, 'fnLista']) -> name('xLista');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
/*
$table->id();
$table->integer('praMod1');
$table->integer('praMod2');
$table->integer('praMod3');
$table->integer('udMod1');
$table->integer('udMod2');
$table->integer('udMod3');
$table->integer('cerIdi');
$table->integer('modTit');
$table->date('fecDet');
$table->integer('estDet');
$table->timestamps();
*/