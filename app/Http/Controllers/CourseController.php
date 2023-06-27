<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_Content;
use App\Models\Course_Subscription;
use Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    function create_course(){
        return view('create_course');
    }

    function create_course_backend(Request $req){
        $data = new Course();

        $data->teacher_id=Auth::user()->id;
        $data->title=$req->title;
        $data->description=$req->description;
        $data->fee=$req->fee;
        
        $data->save();

        return redirect("my_courses");
    }


    function show_search(Request $req){
        $search = $req->search;
        if($search != ""){
            $data = DB::table('courses')->select(
                'courses.id as course_id',
                'courses.teacher_id as course_teacher_id',
                'courses.title as course_title',
                'courses.description as course_description',
                'courses.fee as course_fee',
                'courses.created_at as course_created_at',
                'courses.updated_at as course_updated_at',
                'users.name as course_teacher_name',
                'users.institution as course_teacher_institution',
                'users.email as course_teacher_email'
    
            )->join('users', 'courses.teacher_id', '=' , 'users.id')
            ->where('courses.title', 'LIKE', "%$search%")
            ->orWhere('courses.description', 'LIKE', "%$search%")
            ->orWhere('courses.fee', 'LIKE', "%$search%")
            ->orWhere('users.name', 'LIKE', "%$search%")
            ->orWhere('users.institution', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $data = DB::table('courses')->select(
                'courses.id as course_id',
                'courses.teacher_id as course_teacher_id',
                'courses.title as course_title',
                'courses.description as course_description',
                'courses.fee as course_fee',
                'courses.created_at as course_created_at',
                'courses.updated_at as course_updated_at',
                'users.name as course_teacher_name',
                'users.institution as course_teacher_institution',
                'users.email as course_teacher_email'
    
            )->join('users', 'courses.teacher_id', '=' , 'users.id')
            ->get();

        }
        $data = compact('data', 'search');
        return view('find_course')->with($data);

    }

    function payment_info($id){
        $data = DB::table('courses')->select(
            'courses.id as course_id',
            'courses.teacher_id as course_teacher_id',
            'courses.title as course_title',
            'courses.description as course_description',
            'courses.fee as course_fee',
            'courses.created_at as course_created_at',
            'courses.updated_at as course_updated_at',
            'users.name as course_teacher_name',
            'users.institution as course_teacher_institution',
            'users.email as course_teacher_email'

        )->join('users', 'courses.teacher_id', '=' , 'users.id')
        ->where('courses.id', $id)
        ->get();

    
    $data = compact('data');
    return view('payment_course')->with($data);

    }

    function course_enroll($id){
        $course_subscription = new Course_Subscription();

        $course_subscription->course_id = $id;
        $course_subscription->learner_id = Auth::user()->id;
   
        
        $course_subscription->save();

        return redirect("profile_user");

    }

    function show(){
        $data = DB::table('courses')->select(
            'courses.id as course_id',
            'courses.teacher_id as course_teacher_id',
            'courses.title as course_title',
            'courses.description as course_description',
            'users.name as course_teacher_name',
            'users.email as course_teacher_email',
            'users.institution as course_teacher_institution',
            'course__subscriptions.learner_id as course_learner_id'

        )->join('users', 'courses.teacher_id', '=' , 'users.id')
        ->join('course__subscriptions', 'course__subscriptions.course_id', '=' , 'courses.id')
        ->where('course__subscriptions.learner_id', '=', Auth::user()->id)
        ->get();

        return view('enrolled_courses', ['data' => $data]);

    }

    function show_my_courses(){
        $data = DB::table('courses')->select(
            'courses.id as course_id',
            'courses.teacher_id as course_teacher_id',
            'courses.title as course_title',
            'courses.description as course_description',
            'users.name as course_teacher_name',
            'users.email as course_teacher_email',
            'users.institution as course_teacher_institution',

        )->join('users', 'courses.teacher_id', '=' , 'users.id')
        ->where('courses.teacher_id', '=', Auth::user()->id)
        ->get();

        return view('my_courses', ['data' => $data]);
    }

    function course_content_upload($id){
        $course_id = $id;
        return view('course_content_upload', compact('course_id'));
    }

    function course_content_upload_backend(Request $req, $course_id){

        $data = new Course_Content();
        $file=$req->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $req->file->move('assets', $filename);
        $data->file=$filename;

        $data->user_id=Auth::user()->id;
        $data->title=$req->title;
        $data->description=$req->description;
        $data->course_id = $course_id;
        
        $data->save();

        // $user_name = DB::table('users')->select(
        //     // 'followers.id as follower_id',
        //     // 'followers.user_id as follower_user_id',
        //     'name'
        // )->where('users.id', '=', Auth::user()->id)
        // ->get();


        
        
        return redirect()->back();
        
    }
}
