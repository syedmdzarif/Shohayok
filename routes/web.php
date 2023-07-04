<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FollowController;
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

Route::get("add_following/{id}", [FollowController::class, 'add_following']);

Route::get("follower_add/{id}", [FollowController::class, 'add_follower']);

Route::get("remove_following/{id}", [FollowController::class, 'remove_following']);

Route::get("remove_follower/{id}", [FollowController::class, 'remove_follower']);

Route::get("notifications", [NotificationController::class, 'fetch_notifications']);

Route::get('notification_delete{id}', [NotificationController::class, 'delete_notification']);

Route::get('clear_notifications', [NotificationController::class, 'clear_notifications']);


Route::get("find_content", [ContentController::class, 'show_search']);

Route::get("create_course", [CourseController::class, 'create_course']);
Route::post("create_course_backend", [CourseController::class, 'create_course_backend']);


Route::get("find_course", [CourseController::class, 'show_search']);

Route::get("payment_course/{id}", [CourseController::class, 'payment_info']);

Route::get("course_enroll/{id}", [CourseController::class, 'course_enroll']);

Route::get("enrolled_courses", [CourseController::class, 'show']);


Route::get("my_courses", [CourseController::class, 'show_my_courses']);

Route::get("course_content_upload/{id}", [CourseController::class, 'course_content_upload']);

Route::post("course_content_upload_backend/{id}", [CourseController::class, 'course_content_upload_backend']);

Route::get("view_notification_content/{id}", [NotificationController::class, 'view_notification_content']);

Route::get("course_notification_view/{id}", [NotificationController::class, 'course_notification_view']);




Route::get('view_course_contents_specific/{id}', [CourseController::class, 'show_specific_id']);

Route::get('edit_course_content/{id}', [CourseController::class, 'show_data']);

Route::post('edit_course_content', [CourseController::class, 'update_data']);


Route::get('course_content_delete{id}', [CourseController::class, 'course_content_delete']);


Route::get('view_enrolled_course/{id}', [CourseController::class, 'view_enrolled_course']);


Route::get('support_form/{id}', [SupporterController::class, 'support_form']);

Route::get('support_remove/{id}', [SupporterController::class, 'support_remove']);

Route::post('create_support', [SupporterController::class, 'create_support']);


Route::get('profile_info', [UserController::class, 'profile_info']);


Route::get('chat', [MessageController::class, 'fetch_users']);


Route::get('send_message/{id}', [MessageController::class, 'send_message']);


Route::post('send_message_backend', [MessageController::class, 'send_message_backend']);


Route::get("view_course_specific_from_profile/{id}", [CourseController::class, 'view_course_specific_from_profile']);


Route::post("post_comment_backend/{id}", [CommentController::class, 'post_comment_backend']);


Route::get('comment_delete/{id}', [CommentController::class, 'comment_delete']);


Route::post("post_comment_course_backend/{id}", [CommentController::class, 'post_comment_course_backend']);


Route::get('view_course_comment/{id}', [NotificationController::class, 'view_course_comment']);


