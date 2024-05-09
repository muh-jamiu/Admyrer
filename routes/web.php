<?php

use App\Http\Controllers\AdminController;
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

//Admin route
Route::get('/admin-cp', [AdminController::class, 'index']);

Route::get('/admin-cp/system_status', [AdminController::class, 'system_status']);

Route::get('/admin-cp/changelog', [AdminController::class, 'changelog']);

//api setting
Route::get('/admin-cp/push-notifications-system', [AdminController::class, 'push_notifications_system']);

//reports
Route::get('/admin-cp/manage-reports', [AdminController::class, 'manage_reports']);

//pages
Route::get('/admin-cp/manage-custom-pages', [AdminController::class, 'manage_custom_pages']);

Route::get('/admin-cp/manage-faqs', [AdminController::class, 'manage_faqs']);

Route::get('/admin-cp/pages-seo', [AdminController::class, 'pages_seo']);

Route::get('/admin-cp/manage_terms_pages', [AdminController::class, 'manage_terms_pages']);

//settings
Route::get('/admin-cp/general-settings', [AdminController::class, 'general_settings']);

Route::get('/admin-cp/site-settings', [AdminController::class, 'site_settings']);

Route::get('/admin-cp/site-features', [AdminController::class, 'site_features']);

Route::get('/admin-cp/email-settings', [AdminController::class, 'email_settings']);

Route::get('/admin-cp/video-settings', [AdminController::class, 'video_settings']);

Route::get('/admin-cp/social-login', [AdminController::class, 'social_login']);

Route::get('/admin-cp/live', [AdminController::class, 'live']);

Route::get('/admin-cp/amazon-settings', [AdminController::class, 'amazon_settings']);

//languages
Route::get('/admin-cp/add-language', [AdminController::class, 'add_language']);

Route::get('/admin-cp/manage-languages', [AdminController::class, 'manage_languages']);

//Users
Route::get('/admin-cp/manage-users', [AdminController::class, 'manage_users']);

Route::get('/admin-cp/manage-genders', [AdminController::class, 'manage_genders']);

Route::get('/admin-cp/manage-countries', [AdminController::class, 'manage_countries']);

Route::get('/admin-cp/manage-profile-fields', [AdminController::class, 'manage_profile_fields']);

Route::get('/admin-cp/manage-success-stories', [AdminController::class, 'manage_success_stories']);

Route::get('/admin-cp/manage-verification-requests', [AdminController::class, 'manage_verification_requests']);

//photos
Route::get('/admin-cp/manage-photos', [AdminController::class, 'manage_photos']);

//stickers
Route::get('/admin-cp/manage-stickers', [AdminController::class, 'manage_stickers']);

Route::get('/admin-cp/add-new-sticker', [AdminController::class, 'add_new_sticker']);

//blogs
Route::get('/admin-cp/manage-articles', [AdminController::class, 'manage_articles']);

Route::get('/admin-cp/manage-blog-categories', [AdminController::class, 'manage_blog_categories']);

Route::get('/admin-cp/add-new-article', [AdminController::class, 'add_new_article']);

//gift
Route::get('/admin-cp/manage-gifts', [AdminController::class, 'manage_gifts']);

Route::get('/admin-cp/add-new-gift', [AdminController::class, 'addnew_gift']);

//themes
Route::get('/admin-cp/manage-themes', [AdminController::class, 'manage_themes']);

Route::get('/admin-cp/change-site-design', [AdminController::class, 'change_site_design']);



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