<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Content;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function fetch_user(Request $req){
        // if(request()->query('search')){
        //     // dd(request()->query('search'));
        //     $data = User::where('name', 'LIKE', "%{$search}%")->paginate(4);
        // }
        // else{
        //     $data = User::paginate(4);   
        // }
        // // $data = User::paginate(4);  //user is the name of the model    
        // return view('view_users', ['users' => $data]);
        
        $search = $req->search;
        if($search != ""){
            $users = User::where('name', 'LIKE', "%$search%")->orWhere('institution', 'LIKE', "%$search%")->paginate(4);
        }
        else{
            $users = User::paginate(4);

        }
        $data = compact('users', 'search');
        return view('view_users')->with($data);
    }


    function fetch_user_visit_profile($id){
        
        // $users = User::find($id);
        // $contents = Content::all()->where('user_id', $id);
        // $data = compact('users');
        // return view('view_profile')->with($data);

        $data = DB::table('contents')->select(
            'contents.id as content_id',
            'contents.user_id as content_user_id',
            'contents.title as content_title',
            'contents.description as content_description',
            'contents.file as content_file',
            'contents.created_at as content_created_at',
            'contents.updated_at as content_updated_at',
            'users.id as user_id',
            'users.name as user_name',
            'users.email as user_email',
            'users.institution as user_institution',
         
           

        )->join('users', 'contents.user_id', '=' , 'users.id')
      
        ->where('users.id', $id)
        ->get();
      
        return view("view_profile", ['data' => $data]);

    }

    function create_user(Request $req){

        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->institution = $req->institution;
        $user->password = $req->password;

        // $following = new Following;

       

        $user->save();

        // $following->user_id = $user->id;
        
        // $following->save();

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

    function show_data(){
    $data = User::find(Auth::user()->id);
    return view("update_profile", ['data' => $data]);
    }

    function update_data(Request $req){
        $data = User::find(Auth::user()->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->institution = $req->institution;
        $data->password = $req->password;

        $data->save();
        return redirect('profile_user');
    }


    // function search_users(Request $req){
    //     if($req -> search){
    //         search_users = User::where('name', 'LIKE', '%'. $req ->search. '%')->latest()->paginate(4);
    //         return view()
    //     }
    //     else{

    //     }

    // }
}
