<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/',function(){
    return response()->json("Welcome to admyrer api setup");
});

Route::post('/login', [UserApiController::class, 'loginUser']);

Route::post('/register', [UserApiController::class, 'registerUser']);

Route::post('/county-user', [UserApiController::class, 'countryUser']);

Route::post('/buildPage', [UserApiController::class, 'buildPage']);

Route::get('/all-user', [UserApiController::class, 'getAllUser']);

Route::get('/random-user', [UserApiController::class, 'getAllUser']);

Route::post('/single-user', [UserApiController::class, 'getUser']);

Route::post('/get-visit', [UserApiController::class, 'get_visits']);

Route::post('/get-follows', [UserApiController::class, 'get_follows']);

Route::post('/get-likes', [UserApiController::class, 'getAllLikes']);

Route::post('/my-likes', [UserApiController::class, 'getPersonalLikes']);

Route::post('/get-dislikes', [UserApiController::class, 'getAllDisLikes']);

Route::post('/chat-ai', [UserApiController::class, 'chatGemini']);

Route::post('/get-message', [UserApiController::class, 'getMessage']);

Route::post('/save-message', [UserApiController::class, 'saveMessage']);

Route::post('/search', [UserApiController::class, 'searchUser']);

Route::get('/token', [UserApiController::class, 'getToken']);

Route::post('/get-recent', [UserApiController::class, 'getRecentMessage']);