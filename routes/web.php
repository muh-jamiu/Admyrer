<?php

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

Route::get('/find-matches', [UserController::class, 'index']);

Route::get('/matches', [UserController::class, 'matches']);

Route::get('/visits', [UserController::class, 'visits']);

Route::get('/friends', [UserController::class, 'friends']);

Route::get('/gifts', [UserController::class, 'gifts']);

Route::get('/likes', [UserController::class, 'likes']);

Route::get('/liked', [UserController::class, 'liked']);

Route::get('/disliked', [UserController::class, 'disliked']);

Route::get('/hots', [UserController::class, 'hot']);

Route::get('/stories', [UserController::class, 'stories']);

Route::get('/live-users', [UserController::class, 'live_users']);

Route::get('/friend-requests', [UserController::class, 'friend_requests']);

Route::get('/', function () {
    return view("index");
});

Route::get('/login', function () {
    return view("pages.login");
});

Route::get('/register', function () {
    return view("pages.register");
});

Route::get('/about', function () {
    return view("pages.about");
});

Route::get('/terms', function () {
    return view("pages.terms");
});

Route::get('/contact', function () {
    return view("pages.contact");
});

Route::get('/privacy', function () {
    return view("pages.privacy");
});

Route::get('/faqs', function () {
    return view("pages.faq");
});

Route::get('/blog', function () {
    return view("pages.blog");
});

Route::get('/forgot', function () {
    return view("pages.forgot");
});

Route::get('/steps', function () {
    return view("pages.steps");
});