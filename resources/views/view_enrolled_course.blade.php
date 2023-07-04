<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/view_enrolled_course.css">
    <title>View Course</title>
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
        <h2>View Course</h2>
        <ul>
            <li><a href="{{url('/profile_user')}}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{url('/upload_content')}}"><i class="fa-solid fa-cloud-arrow-up"></i> Upload Content</a></li>
            <li><a href="{{url('/newsfeed')}}"><i class="fa-solid fa-square-rss"></i> Newsfeed</a></li>
            <li><a href="{{url('/find_content')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Content</li>
            <li><a href="{{url('/upload_history')}}"><i class="fa-solid fa-file"></i> Upload History</li>
            <li><a href="{{url('/chat')}}"><i class="fa-solid fa-comment"></i> Chat</a></li>
            <li><a href="{{'update_profile'}}"><i class="fa-solid fa-user"></i> Update Profile</li>
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

<div class="feed">
    @foreach($data as $row)
        <div class="box_each">
            
            <div class="img">
                <iframe height="500px" width="500px" src=' /assets/{{$row->content_file}}'> </iframe>
                <br>
               
            
            <br>
            <br>

       
            </div>

            <div class="details">
                
                <label class="title">{{$row->content_title}}</label>
                <br>
                <label class="description">{{$row->content_description}}</label>
                <br>
                <br>
          
                <a class="e_login" href="{{url('view_profile/'.$row->content_user_id)}}"><label class="user_name">{{$row->user_name}}</label></a>
                <br>
                <label class="institution">{{$row->user_institution}}</label>
                <br>
                
           
                <label class="p_title">Uploaded: </label>
                <label class="created">{{$row->content_created_at}}</label>
                <br>
                <label class="p_title">Edited: </label>
                <label class="created">{{$row->content_updated_at}}</label>
                <br>
                <a href="{{url('/download'. $row->content_file)}}"><label class="download">Click to Download</label></a>
                <br>
                <br>

                <p class="title"><b>Comments</b></p>
                
                <div class="user_comments">
                    @foreach($comments as $comment)
                        @if($comment->comment_content_id == $row->content_id && $comment->comment_type == 'course')
                        <a class="e_login" href="{{url('view_profile/'.$comment->comment_user_id)}}"><label class="commenter">{{$comment->user_name}}: </lable></a><br><label class="commenter">{{$comment->comment}}</label><label class="created_at"> - {{$comment->comment_created_at}}</label></label>
                        @if($comment->user_id == Auth::user()->id)
                            <a class="e_login" href="{{url('comment_delete/'.$comment->comment_id)}}"><label class="download">Delete</label></a>
                        @endif
                        
                        <br>

                        @endif
                    @endforeach
                    
                </div>
                <form action="{{url('/post_comment_course_backend/'.$row->content_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="comment">
                        <div class="left">
                            <input type="hidden" name="user_id" value={{$row->user_id}}>
                            <input type="hidden" name="course_id" value={{$row->course_id}}>
                            <input type="text" name="comment" placeholder="Write a comment">
                        </div>
                        <div class="right">
                            <button type="submit"><b>Post</b></button>
                        </div>
                    </div>
                </form>
                
            </div>

        </div>
       
        @endforeach
    </div>  

    <div class="info_class">
    <div class="info">
        <h2>{{$data[0]->course_title}} <br> 
        <!-- <label class = "author"> {{$data[0]->course_description}} </label>  -->
        </h2>
        <ul>
        <li><a href="{{url('send_message/'.$data[0]->user_id)}}">Send a Message to {{$data[0]->user_name}}</a></li>
        
        </ul>
    </div>

</div>



</div>

</body>

</html>