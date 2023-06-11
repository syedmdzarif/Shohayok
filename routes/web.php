<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('login', function () {       
    return view('login');
});

Route::get('login_admin', function () {       
    return view('login_admin');
});

// Route::get('about_us', function () {       
//     return view('about_us');
// });

Route::get("about_us", [UserController::class, 'fetch_user']);

Route::post("signup", [UserController::class, 'create_user']);


