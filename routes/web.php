<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

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

Route::get('/', [ItemController::class, 'index']);
Route::resource('review', ReviewController::class);
Route::resource('item', ItemController::class);
Route::resource('upload', UploadController::class);
Route::resource('user', UserController::class);
Route::resource('like', LikeController::class);
Route::resource('follow', FollowController::class);
Route::get('item/{id}/{page}', 'App\Http\Controllers\ItemController@show')->name('items.show');

Route::post('item/{id}/{page}', 'App\Http\Controllers\ItemController@store')->name('items.show');
Route::delete('follow/{id}/{currentUser}', 'App\Http\Controllers\FollowController@destroy')->name('items.show');
Route::delete('review/{id}', 'App\Http\Controllers\ReviewController@destroy')->name('items.show');
Route::resource('item', 'App\Http\Controllers\ItemController', ['except' => 'show']);
Route::get('review/{id}/edit', [ReviewController::class, 'edit_review']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
