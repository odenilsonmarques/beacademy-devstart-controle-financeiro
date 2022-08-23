<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::get('/',[DashboardController::class,'home'])->name('home');

Route::get('/dashboard',[DashboardController::class,'dash'])->name('dash')->middleware('auth');

Route::get('/release/create',[ReleaseController::class,'create'])->name('release.create')->middleware('auth');
Route::post('/release',[ReleaseController::class,'createAction'])->name('release.createAction')->middleware('auth');

Route::any('/search',[ReleaseController::class,'filter'])->name('search.filter')->middleware('auth');
Route::get('/releases',[ReleaseController::class,'list'])->name('releases.list')->middleware('auth');

Route::get('/release/{id}',[ReleaseController::class,'destroy'])->name('release.destroy')->middleware('auth');

Route::get('/release/{id}/edit',[ReleaseController::class,'edit'])->name('release.edit')->middleware('auth');
Route::put('/release/{id}',[ReleaseController::class,'editAction'])->name('release.editAction')->middleware('auth');

Route::get('/user',[UserController::class,'display'])->name('user.display')->middleware('auth');

Route::fallback(function () {
    return view('notFound.404');

});

require __DIR__.'/auth.php';
