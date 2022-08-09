<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__.'/auth.php';

Route::get('/',[DashboardController::class,'home'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/release/create',[ReleaseController::class,'create'])->name('release.create')->middleware('auth');
    Route::post('/release',[ReleaseController::class,'createAction'])->name('release.createAction')->middleware('auth');

    Route::get('/releases',[ReleaseController::class,'list'])->name('releases.list')->middleware('auth');

    Route::get('/release/{id}',[ReleaseController::class,'destroy'])->name('release.destroy')->middleware('auth');

    Route::get('/release/{id}/edit',[ReleaseController::class,'edit'])->name('release.edit')->middleware('auth');
    Route::put('/release/{id}',[ReleaseController::class,'editAction'])->name('release.editAction')->middleware('auth');

    Route::get('/user',[UserController::class,'display'])->name('user.display')->middleware('auth');

    Route::get('/posts',[PostController::class,'list'])->name('posts.list')->middleware('auth');//exibe todos os post e seu usuario

    Route::get('/user/{id}/posts',[PostController::class,'show'])->name('posts.show')->middleware('auth');//exibe os post de um determinado usuario
});

//rota para perfil admintrador
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin',[UserController::class,'admin'])->name('admin');
});

Route::fallback(function () {
    return view('notFound.404');

});


