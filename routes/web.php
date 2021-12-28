<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//
Route::get('/', function () {
    return redirect()->route('posts.index');
});

//Route::get('/', function () {
//    return view("backend.layout.master");
//});

Route::prefix('users')->group(function (){
    Route::get('/',[UserController::class,"index"])->name('users.index');
    Route::get('/create',[UserController::class,"create"])->name('users.create');
    Route::post('/create',[UserController::class,"store"])->name('users.store');
    Route::get('/{id}/update',[UserController::class,"edit"])->name('users.edit');
    Route::post('/{id}/update',[UserController::class,"update"])->name('users.update');
    Route::get('/{id}/detail',[UserController::class,"show"])->name('users.show');
    Route::get('/{id}/delete',[UserController::class,"destroy"])->name('users.destroy');
});

Route::prefix('posts')->group(function (){
    Route::get('/',[PostController::class,"index"])->name('posts.index');
    Route::get('/create',[PostController::class,"create"])->name('posts.create');
    Route::post('/create',[PostController::class,"store"])->name('posts.store');
    Route::get('/{id}/update',[PostController::class,"edit"])->name('posts.edit');
    Route::post('/{id}/update',[PostController::class,"update"])->name('posts.update');
    Route::get('/{id}/detail',[PostController::class,"show"])->name('posts.show');
    Route::get('/{id}/delete',[PostController::class,"destroy"])->name('posts.destroy');
});

Route::get('/login',[AuthController::class,"showFormLogin"])->name("admin.showFormLogin");
Route::post('/login',[AuthController::class,"login"])->name("admin.login");

Route::get('/logout',[AuthController::class,"logout"])->name("admin.logout");

Route::get('/register',[AuthController::class,"showFormRegister"])->name("admin.showFormRegister");
Route::post('/register',[AuthController::class,"register"])->name("admin.register");
