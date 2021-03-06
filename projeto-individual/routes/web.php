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

Route::get('/release/create',[ReleaseController::class,'create'])->name('release.create');
Route::post('/release',[ReleaseController::class,'createAction'])->name('release.createAction');

Route::get('/releases',[ReleaseController::class,'list'])->name('releases.list');

Route::get('/release/{id}',[ReleaseController::class,'destroy'])->name('release.destroy');

Route::get('/release/{id}/edit',[ReleaseController::class,'edit'])->name('release.edit');
Route::put('/release/{id}',[ReleaseController::class,'editAction'])->name('release.editAction');




