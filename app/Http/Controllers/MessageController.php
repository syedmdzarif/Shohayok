<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Follower;
use App\Models\Following;
use App\Models\Notification;
use App\Models\User;
use App\Models\Content;
use App\Models\Message;

class MessageController extends Controller
{
    function fetch_users(){
        $followings = DB::table('users')->select(
            'users.id as user_id',
            'users.name as user_name',
            'users.institution as user_institution',
            'users.email as user_email',
            'users.profile_picture as user_profile_picture'

        )->join('followings', 'followings.following_id' , '=', 'users.id')
        ->where('followings.user_id' , Auth::user()->id)
        ->get();

        $followers = DB::table('users')->select(
            'users.id as user_id',
            'users.name as user_name',
            'users.institution as user_institution',
            'users.email as user_email',
            'users.profile_picture as user_profile_picture'

        )
        ->join('followers', 'followers.follower_id' , '=', 'users.id')
        ->where('followers.user_id' , Auth::user()->id)
        ->get();

        return view('chat', compact('followings', 'followers'));  
    }

    function send_message($id){
        $sent =  DB::table('messages')->select(
            'messages.receiver_id as r_id',
            'messages.message as message',
            'messages.file as file',
            'messages.created_at as time',
            'users.name as receiver_name'
        )->join('users', 'users.id', '=', 'messages.receiver_id')
        ->where('messages.receiver_id', $id)
        ->where('messages.sender_id', Auth::user()->id)
        ->orWhere('messages.receiver_id', Auth::user()->id)
        ->where('messages.sender_id', $id)
        
        ->get();


        $r_name = DB::table('users')->select(
            'users.name as other_name'
        )
        ->where('users.id', $id)
        ->get();


        $receiver_id = $id;
        return view('send_message', compact('receiver_id', 'sent', 'r_name'));

    }


    function send_message_backend(Request $req){
        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $req->receiver_id;
        $message->message = $req->message;
        if($req->file == ""){
            $message->file == "No attachments";
        }
        else{
            $file=$req->file;
            $filename= time().'.'.$file->getClientOriginalExtension();
            $req->file->move('assets', $filename);
            $message->file=$filename;
        }



        $notification = new Notification();
        $notification->user_id = $req->receiver_id;
        $notification->uploader_id = Auth::user()->id;
        $notification->message = "New message from ".Auth::user()->name;
        $notification->type = "message";

        $notification->save();

        $message->save();

        return redirect()->back();

    }
}
