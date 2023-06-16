<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;


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
    function user_login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $req -> only('email', 'password');

        if(Auth::attempt($credentials)){
            // $data = $req -> input('email');
            // $req -> session()->put('user', $data)
            return redirect("profile_user");
        }
        else{
            return redirect("login")->withSuccess("Login Details ");
        }
        

    }

    function user_logout(){
        Session::flush();
        Auth::logout();
        return redirect("login");
    }
}
