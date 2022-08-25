<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Users
Route::post('verify-user',[UsersController::class,"verify"]);
Route::post('register-user',[UsersController::class,"store"]);
Route::post('update-profile-image',[UsersController::class,"updateImage"]);
// Route::get('get-non-friend-user',[UsersController::class,"index"]);
Route::get('get-users',[UsersController::class,"index"]);

// Messaging / Chat
Route::post('send-message',[ChatsController::class,"store"]);
Route::get('get-user-chat-rooms',[RoomsController::class,"index"]);
Route::get('get-room-chats',[ChatsController::class,"roomChats"]);
Route::post('verify-chat-room',[RoomsController::class,"verify"]);

// Friends
Route::get('get-user-friends',[FriendsController::class,"index"]);
Route::post('add-friend',[FriendsController::class,"store"]);

// Notifications
Route::get("get-notifications",[NotificationsController::class,"index"]);