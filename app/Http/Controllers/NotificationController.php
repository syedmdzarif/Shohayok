<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Auth;

class NotificationController extends Controller
{
    function fetch_notifications(){

        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        return view("notifications", ['notifications' => $notifications]);

    }

    function delete_notification($id){
        $notification = Notification::find($id);
        $notification->delete();
        return redirect()->back();

    }

    function view_notification_content($id){

        $data = DB::table('contents')->select(
            'contents.id as content_id',
            'contents.user_id as content_user_id',
            'contents.title as content_title',
            'contents.description as content_description',
            'contents.file as content_file',
            'contents.created_at as content_created_at',
            'contents.updated_at as content_updated_at',
            'users.name as user_name',
            'users.institution as user_institution'

        )->join('users', 'contents.user_id', '=' , 'users.id')
        ->join('notifications', 'notifications.content_id', '=', 'contents.id')
        ->where('notifications.id', '=', $id)
        ->get();

        return view('view_notification_content', ['data' => $data]);
        
    }

    function course_notification_view($id){

        $data = DB::table('course__contents')->select(
            'course__contents.id as content_id',
            'course__contents.user_id as content_user_id',
            'course__contents.title as content_title',
            'course__contents.description as content_description',
            'course__contents.file as content_file',
            'course__contents.created_at as content_created_at',
            'course__contents.updated_at as content_updated_at',
            'users.name as user_name',
            'courses.title as course_title',
            'users.institution as user_institution'

        )->join('users', 'course__contents.user_id', '=' , 'users.id')
        ->join('notifications', 'notifications.content_id', '=', 'course__contents.id')
        ->join('courses', 'courses.id', '=', 'course__contents.course_id')
        ->where('notifications.id', '=', $id)
        ->get();

        return view('course_notification_view', ['data' => $data]);
        

    }
}
