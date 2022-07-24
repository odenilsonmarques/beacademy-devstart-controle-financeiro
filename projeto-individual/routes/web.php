<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReleaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lancamento/novo',[ReleaseController::class,'create'])->name('lancamento.create');
Route::post('/lancamento',[ReleaseController::class,'createAction'])->name('lancamento.createAction');

Route::get('/lancamentos',[ReleaseController::class,'list'])->name('lancamentos.list');

Route::get('/excluir/{id}',[ReleaseController::class,'destroy'])->name('excluir.destroy');



