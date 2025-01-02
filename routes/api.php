<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\GlobalController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(UserController::class)->group(function () {
    Route::get('/logged-in-user', 'loggedInUser');
    Route::patch('/update-user', 'updateUser');
    Route::get('/get-user/{id}', 'getUser');
    Route::post('/update-user-image', 'updateUserImage');
});
Route::get("/get-random-users",[GlobalController::class,"getRandomUsers"]);
Route::resource('posts', PostController::class);
Route::resource('home', HomeController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('likes',LikeController::class);
Route::resource('comments',CommentController::class);
