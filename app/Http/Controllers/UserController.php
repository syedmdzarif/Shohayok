<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    function fetch_user(){
        
        $data = User::paginate(2);  //user is the name of the model  
        return view('about_us', ['users' => $data]);
    }

    function create_user(Request $req){

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->institution = $req->institution;
        $user->password = $req->password;

        $user->save();

        return redirect("homepage");

    }
}
