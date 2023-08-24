<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/upload_history.css">
    <title>Find Courses</title>
</head>
<body>

<header id="main-header">
        <div class="container">
            <h1>Shohayok</h1>
            <!-- <h6>For the students, by the students<h6> -->
        </div>
</header>

<div class="wrapper">
    <div class="sidebar">
        <h2>Find Course</h2>
        <ul>
            <li><a href="{{url('/profile_user')}}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{url('/upload_content')}}"><i class="fa-solid fa-cloud-arrow-up"></i> Upload Content</a></li>
            <li><a href="{{url('/newsfeed')}}"><i class="fa-solid fa-square-rss"></i> Newsfeed</a></li>
            <li><a href="{{url('/find_content')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Content</li>
            <li><a href="{{url('/upload_history')}}"><i class="fa-solid fa-file"></i> Upload History</li>
            <li><a href="{{url('/chat')}}"><i class="fa-solid fa-comment"></i> Chat</a></li>
            <!-- <li><a href="{{'update_profile'}}"><i class="fa-solid fa-user"></i> Update Profile</li> -->
            <li><a href="{{url('/view_users')}}"><i class="fa-solid fa-magnifying-glass"></i> Find People</li>
            <li><a href="{{url('/notifications')}}"><i class="fa-sharp fa-solid fa-bell fa-shake"></i> Notifications</li>
            <li><a href="{{url('/create_course')}}"><i class="fa-solid fa-plus"></i> Create Course</li>
            <li><a href="{{url('/enrolled_courses')}}"><i class="fa-solid fa-file"></i> Enrolled Courses</li>
            <li><a href="{{url('/find_course')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Courses</li>
            <li><a href="{{url('/my_courses')}}"><i class="fa-solid fa-file"></i> My Courses</li>
            <li><a href="{{url('/logout')}}"><i class="fa-solid fa-xmark"></i> Logout</a></li>
        </ul>
    </div>
</div>



<div class="main_content">
    <div class="search_box">

        <form action={{'find_course'}} class="search_bar">
            <input type="search" name="search" id="" class="course_find" placeholder="Search course by title, type, instructor..."  value="{{$search}}">
            &nbsp&nbsp&nbsp<button>Search</button>

            <a href="{{url('find_course')}}">
                Reset Search
            </a>
        </form>
    </div>

   <div class="table_allign">
    <table class="table">
        
        <tr>
  
            <th>Title</th>
            <th>Description</th>
            <th>Instructor</th>
            <th>Institution</th>
            
            <th>Created At</th>
            <!-- <th>Updated At</th> -->

            <th>Fee</th>
            <th>Actions</th>
        </tr>


    





    @foreach($data as $row)

        <?php
            $flag = 0;
        ?>
    
    

        <tr>
        <!-- <td>{{$row->course_id}}</td> -->
        <td>{{$row->course_title}}</td>
        <td>{{$row->course_description}}</td>
        <td>{{$row->course_teacher_name}}</td>
        <td>{{$row->course_teacher_institution}}</td>
        
        <td>{{$row->course_created_at}}</td>
        <!-- <td>{{$row->course_updated_at}}</td> -->
        <td>{{$row->course_fee}}</td>


        
        

        @foreach($sub as $value)
                <?php
                    if($value->course_id == $row->course_id && $value->learner_id == Auth::user()->id && $row->user_id != Auth::user()->id){
                        $flag = 1;
                        break;
                        
                    }
                    elseif($value->course_id == $row->course_id && $row->user_id == Auth::user()->id){
                        $flag = 2;
                        break;
                    }
                    else{
                        $flag = 0;
                    }
                ?>

        @endforeach




        @if($flag == 1)
        
        <td><a class="e_login" href="{{url('view_enrolled_course/'.$row->course_id)}}">Open</a></td>
        @elseif($flag == 2)
        <td><a href="{{'view_course_contents_specific/'.$row->course_id}}">Edit</a></td>

        @else

        <td><a class="e_login" href="{{url('payment_course/'.$row->course_id)}}">Enroll</a></td>

        @endif
        
        </tr>

        <?php
            $flag = 0;
        ?>

       

    @endforeach

    </table>

</html>