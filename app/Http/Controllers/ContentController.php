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
        $data = DB::table('contents')
        ->get();
        return view('newsfeed', ['data' => $data]);
    
    }

    function download(Request $request, $file){
        // return response()->download(public_path('assets/'.$file));
        return response()->download(public_path('assets/'.$file));

    }

    function view($id){
        $data = Content::find($id);
        return view('newsfeed', compact('data_view'));

    }
}
