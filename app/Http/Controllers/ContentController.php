<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Notification;
use App\Models\User;
use App\Models\Follower;
use App\Models\Following;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;     //for download


class ContentController extends Controller
{
    function upload(){
        return view('upload_content');
    }

    function upload_backend(Request $req){
        $data = new Content();
        $file=$req->file;
        
        $filename= $req->title.'_'.time().'.'.$file->getClientOriginalExtension();
        $req->file->move('assets', $filename);
        $data->file=$filename;

        $data->user_id=Auth::user()->id;
        $data->title=$req->title;
        $data->description=$req->description;
        
        $data->save();

        // $user_name = DB::table('users')->select(
        //     // 'followers.id as follower_id',
        //     // 'followers.user_id as follower_user_id',
        //     'name'
        // )->where('users.id', '=', Auth::user()->id)
        // ->get();


        $followers = DB::table('followers')->select(
            // 'followers.id as follower_id',
            // 'followers.user_id as follower_user_id',
            'followers.follower_id as follower_follower_id'
        )->where('followers.user_id', '=', Auth::user()->id)
        ->get();

        foreach($followers as $follower){

        $notification = new Notification();
        $notification->user_id = $follower->follower_follower_id;
        $notification->uploader_id = Auth::user()->id;
        $notification->message = 'New content uploaded by '. Auth::user()->name . ' titled "'. $req->title . '"';
        $notification->content_id = $data->id;
        $notification->type = 'content';
        $notification->save();

        }
        
        return redirect()->back();
    }

    function show(){
        // $data=Content::all();
        // return view('newsfeed', compact('data'));
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
        ->join('followings', 'contents.user_id', '=', 'followings.following_id')
        ->where('followings.user_id', '=', Auth::user()->id)
        ->get();

        
        
        return view('newsfeed', ['data' => $data]);

    }

    function download(Request $request, $file){
        // return response()->download(public_path('assets/'.$file));
        return response()->download(public_path('assets/'.$file));

    }

   

    // function view($id){
    //     $data = Content::find($id);
    //     return view('newsfeed', compact('data_view'));

    // }

    function show_specific_id(){
        // $data=Content::all();
        // return view('newsfeed', compact('data'));
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
        ->where('users.id', Auth::user()->id)
        ->get();
        
        return view('upload_history', ['data' => $data]);

    }

    function delete_content($id){
        $data = Content::find($id);
        $data->delete();
        return redirect("upload_history");
    }


    function show_data($id){
        $data = Content::find($id);
        return view("edit_content", ['data' => $data]);
        
        }
    
        function update_data(Request $req){
            $data = Content::find($req->id);
            $data->title = $req->title;
            $data->description = $req->description;
            
            $data->save();
            return redirect('profile_user');
        }

        function show_search(Request $req){
            $search = $req->search;
            if($search != ""){
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
                ->where('contents.title', 'LIKE', "%$search%")
                ->orWhere('contents.description', 'LIKE', "%$search%")
                ->orWhere('users.name', 'LIKE', "%$search%")
                ->orWhere('users.institution', 'LIKE', "%$search%")
                ->get();
            }
            else{
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
                ->get();
    
            }
            $data = compact('data', 'search');
            return view('find_content')->with($data);

        }
}
