<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Storage;     //for download

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

Route::get('/', function () {
    return view('welcome');
});


Route::view('homepage', 'homepage');

// Route::get('signup', function () {       
//     return view('signup');
// });

Route::view('signup', 'signup');

Route::view('profile_user', 'profile_user');

// Route::get('login', function () {       
//     return view('login');
// });

Route::get('login_admin', function () {       
    return view('login_admin');
});

// Route::get('about_us', function () {       
//     return view('about_us');
// });

Route::post("signup", [UserController::class, 'create_user']);


Route::view('login', 'login');
Route::post("login_user", [UserController::class, 'user_login']);

Route::get("logout", [UserController::class, 'user_logout']);

Route::get("upload_content", [ContentController::class, 'upload']);

Route::post("upload_backend", [ContentController::class, 'upload_backend']);

Route::get("newsfeed", [ContentController::class, 'show']);

Route::get('download{file}', [ContentController::class, 'download']);

// Route::get("newsfeed{id}", [ContentController::class, 'view']);

Route::get("upload_history", [ContentController::class, 'show_specific_id']);

Route::get('delete{id}', [ContentController::class, 'delete_content']);

Route::get('update_profile', [UserController::class, 'show_data']);

Route::post('update_profile', [UserController::class, 'update_data']);



Route::get('edit_content/{id}', [ContentController::class, 'show_data']);

Route::post('edit_content', [ContentController::class, 'update_data']);

Route::get("view_users", [UserController::class, 'fetch_user']);



Route::get("view_profile/{id}", [UserController::class, 'fetch_user_visit_profile']);

