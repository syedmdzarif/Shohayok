<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;


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
}
