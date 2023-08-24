<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/my_courses.css">
    <title>Notification</title>
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
        <h2>Notification</h2>
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

<div class="table_allign">
    <table >
        
        <tr>
  
        <th>Content</th>
            <th>Title</th>
            <th>Description</th>
            <th>Uploaded By</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    @foreach($data as $row)
    
        <tr>
        <td><iframe height="500px" width="500px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        <td>{{$row->content_title}}</td>
        <td>{{$row->content_description}}</td>
        <td>{{$row->user_name}}</td>
        <!-- <td>{{$row->user_institution}}</td> -->
        
        <td>{{$row->content_created_at}}</td>
        <!-- <td>{{$row->content_updated_at}}</td> -->
        <!-- <td>{{$row->content_file}}</td> -->
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>
 
            @foreach($comments as $comment)
            <tr>
                
                @if($comment->comment_content_id == $row->content_id && $comment->comment_type == 'content')
                <td>
                    <a class="e_login" href="{{url('view_profile/'.$comment->comment_user_id)}}"><label class="commenter">{{$comment->user_name}}: </lable></a><br><label class="commenter">{{$comment->comment}}</label><label class="created_at"> - {{$comment->comment_created_at}}</label></label>
                </td>
                <td>
                    <a class="e_login" href="{{url('comment_delete/'.$comment->comment_id)}}"><label class="commenter">Delete</label></a>
                </td>
                
                <br>

                @endif
                
            </tr>
            @endforeach

     @endforeach

     </table>

</div>

    

</html>