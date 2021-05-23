<?php

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
Route::get('/',function (){return view('welcome');});

Auth::routes();


Route::get('/sendmail', function () {
    \Illuminate\Support\Facades\Mail::to('prashant.om@somaiya.edu')->send(new \App\Mail\PostMail());
    return view('welcome');});

Route::get('/mail', function (){ return new \App\Mail\PostMail();});

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');

Route::get('/p/getprob', [App\Http\Controllers\PostsController::class, 'getprob']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit']);
Route::get('/p/{post}/accept', [App\Http\Controllers\PostsController::class, 'accept']);
Route::patch('/p/{post}', [App\Http\Controllers\PostsController::class, 'update']);
Route::delete('/p/{post}', [App\Http\Controllers\PostsController::class, 'destroy']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/q/{question}/comment', [App\Http\Controllers\CommentsController::class,'commentQuestion']);
Route::get('/p/{post}/comment', [App\Http\Controllers\CommentsController::class, 'commentPost']);
Route::get('/pr/{project}/comment', [App\Http\Controllers\CommentsController::class, 'commentProject']);
Route::get('/a/{answer}/comment', [App\Http\Controllers\CommentsController::class, 'commentAnswer']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
