<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/chat.css">
    <title>Chat</title>
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
        <h2>Chat</h2>
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
<h2>Open a chat</h2>
<br>
<p>Your conversations will appear here once</p>
<p>a chat is opened.</p>
</div>

<div class="flw">
    <div class="information_class">
        <div class="information">
            <h2>Followers</h2>

        @foreach($followers as $row)
<ul>
        
     
    
        <li><a class="e_login" href="{{url('send_message/'.$row->user_id)}}"><b>{{$row->user_name}}</b></a>

        {{$row->user_institution}}
</li>
       
       
   
</ul>

    @endforeach

</div>

</div>

<div class="info_class">
    <div class="info">


    <h2>Followings</h2>
   

    @foreach($followings as $row)

        <ul>
        <li>
    
        <a class="e_login" href="{{url('send_message/'.$row->user_id)}}"><b>{{$row->user_name}}</b></a></td>
 

        {{$row->user_institution}}</li>
 
       
   
</ul>

    @endforeach


        </div>
    </div>

</div>

</div>

</body>

</html>