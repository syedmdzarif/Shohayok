<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
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
        $filename=time().'.'.$file->getClientOriginalExtension();
        $req->file->move('assets', $filename);
        $data->file=$filename;

        $data->user_id=Auth::user()->id;
        $data->title=$req->title;
        $data->description=$req->description;
        
        $data->save();
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
}
