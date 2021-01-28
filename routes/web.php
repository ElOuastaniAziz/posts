<?php

use App\Http\Controllers\Auth\LoginControlador;
use App\Http\Controllers\Auth\LogoutControlador;
use App\Http\Controllers\Auth\RegisterControlador;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])
            ->name('dashboard');
            //->middleware('auth'); // si no esta identificado, no se irá al dashboard


Route::get('/login',[LoginControlador::class,'index'])->name('login');
Route::post('/login',[LoginControlador::class,'store']);

Route::get('/users/{user:username}/posts',[UserPostController::class,'index'])->name('users.posts');

Route::post('/logout',[LogoutControlador::class,'store'])->name('logout');


Route::get('/register',[RegisterControlador::class,'index'])->name('register'); //[clase,'método']
Route::post('/register',[RegisterControlador::class,'store']); //no hace falta poner ->name->...
//ya que lo herida del otro registro

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('/posts/{post}/likes',[PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class,'destroy']);//->name('posts.likes');






