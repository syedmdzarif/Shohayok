<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Notification;
use App\Models\User;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Following;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;     //for download



class CommentController extends Controller
{
   
    function post_comment_backend(Request $req, $id){
        $data = new Comment();

        $data->user_id=Auth::user()->id;
        $data->comment=$req->comment;
        $data->type='content';
        $data->content_id=$id;
       
        
        $data->save();

        $notification = new Notification();
        $notification->user_id = $req->user_id;
        $notification->uploader_id = Auth::user()->id;
        $notification->message = Auth::user()->name .' commented on your post '.'"'. $req->comment . '"';
        $notification->content_id = $id;
        $notification->type = 'comment_content';
        $notification->save();

        return redirect("newsfeed");
    }


    function post_comment_course_backend(Request $req, $id){
        $data = new Comment();

        $data->user_id=Auth::user()->id;
        $data->comment=$req->comment;
        $data->type='course';
        $data->content_id=$id;
       
        
        $data->save();

        $notification = new Notification();
        $notification->user_id = $req->user_id;
        $notification->uploader_id = Auth::user()->id;
        $notification->message = Auth::user()->name .' commented on your course content '.'"'. $req->comment . '"';
        $notification->content_id = $id;
        $notification->course_id = $req->course_id;
        $notification->type = 'comment_course';
        $notification->save();

        return redirect()->back();
    }


    function comment_delete($id){
        $data = DB::table('comments')->where('id', $id);
        $data->delete();
        return redirect()->back();
    }
}
