<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supporter;
use App\Models\Notification;
use Auth;
use Illuminate\Support\Facades\DB;

class SupporterController extends Controller
{
    function support_form($id){
        $user_info = DB::table('users')
        ->select(
            'users.name as user_name'
        )
        ->join('supporters', 'supporters.subscribed_to_id', '=', 'users.id')
        ->where('subscribed_to_id', $id)
        ->get();

        $user_id = $id;
        return view('support_form', compact('user_id', 'user_info'));
    }

    function support_remove($id){
      
        DB::table('supporters')->where('subscribed_to_id', $id)->where('subscriber_id', Auth::user()->id)->delete();
        return redirect()->back();
        
    }

    function create_support(Request $req){
        $supporter = new Supporter();
        $supporter->subscribed_to_id = $req->user_id;
        $supporter->fee = $req->fee;
        $supporter->subscriber_id = Auth::user()->id;

        $supporter->save();



        $notification = new Notification();
        $notification->user_id = $req->user_id;
        $notification->uploader_id = Auth::user()->id;
        $notification->type = "sub";
        $notification->message = Auth::user()->name." from ".Auth::user()->institution." subscribed to you for ". $req->fee. ".00 BDT/Month";

        $notification->save();

        return redirect("profile_user");

    }
}
