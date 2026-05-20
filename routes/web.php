<?php

use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Post\PostReactionController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('login.login');
});


Route::get('/account', function () {
    return view('account.account');
})->name('account');


Route::post('/account', [UserController::class, 'account'])->name('account.post');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', [PostController::class, 'index']);



Route::get('/create', function () {
    return view('create.create');
})->name('create');




Route::post("/createreaction", [PostReactionController::class, 'createReaction'])->name('createreaction');
Route::post("/listreaction", [PostReactionController::class, 'getCountReaction'])->name('getCountReaction');



Route::post('/register', [PostController::class, 'create'])->name('register');
Route::get('/details', [PostController::class, 'index'])->name('details');



use App\Http\Controllers\Comments\CommentsController;

Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentsController::class, 'select'])->name('comments.select');
