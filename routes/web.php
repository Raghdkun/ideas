<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [
    DashboardController::class, 'index'
])->name('home');
Route::post('/newfeed', [
    FeedController::class, 'store'
])->name('feed.create');

Route::get('/newfeed/{feed}', [
    FeedController::class, 'show'
])->name('feed.show');

Route::get('/newfeed/{feed}/edit', [
    FeedController::class, 'edit'
])->name('feed.edit')->middleware('auth');

Route::put('/newfeed/{feed}', [
    FeedController::class, 'update'
])->name('feed.update')->middleware('auth');

Route::delete('/newfeed/{id}', [
    FeedController::class, 'destroy'
])->name('feed.destroy')->middleware('auth');

Route::get('/feed', [
    DashboardController::class, 'feed'
]);



Route::get('/terms', [
    DashboardController::class, 'terms'
]);


Route::post('/newfeed/{feed}/comments', [
    CommentController::class, 'store'
])->name('feed.comments.create')->middleware('auth');


Route::get('myprofile', [UserController::class, 'profile'])->middleware('auth')->name('myprofile') ; 


//new way to define routes 

Route::resource('user', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::post('users/{user}/follow', [FollowersController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowersController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('feeds/{feed}/like', [LikeController::class, 'like'])->middleware('auth')->name('feeds.like');
Route::post('feeds/{feed}/unlike', [LikeController::class, 'unlike'])->middleware('auth')->name('feeds.unlike');

Route::get('/mail', [
    DashboardController::class, 'mail'
])->name('mail');

