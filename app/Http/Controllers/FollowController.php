<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Follower;
use App\Models\Following;
use App\Models\User;
use App\Models\Content;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    function add_follower($id){
        $follower = new Follower;

        $follower->user_id = $id;
        $follower->follower_id = Auth::user()->id;

        $follower->save();


        return redirect()->back();
        
    }

    function add_following($id){

        $following = new Following;

        $following->user_id = Auth::user()->id;
        $following->following_id = $id;

        $following->save();

        return redirect()->back();
    }

    function remove_following($id){
        $data = DB::table('followings')->where('user_id', Auth::user()->id)->where('following_id', $id);
        $data->delete();
        return redirect()->back();
    }

    function remove_follower($id){
        $data = DB::table('followers')->where('user_id', $id)->where('follower_id', Auth::user()->id);
        $data->delete();
        return redirect()->back();
    }
}
