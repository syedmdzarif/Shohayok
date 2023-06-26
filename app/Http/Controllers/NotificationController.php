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
}
