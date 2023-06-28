<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/newsfeed.css">
    <title>Newsfeed</title>
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
        <h2>News Feed</h2>
        <ul>
            <li><a href="{{url('/profile_user')}}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{url('/upload_content')}}"><i class="fa-solid fa-cloud-arrow-up"></i> Upload Content</a></li>
            <li><a href="{{url('/newsfeed')}}"><i class="fa-solid fa-square-rss"></i> Newsfeed</a></li>
            <li><a href="{{url('/find_content')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Content</li>
            <li><a href="{{url('/upload_history')}}"><i class="fa-solid fa-file"></i> Upload History</li>
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

       
            </div>

            <div class="details">
                <p><b>Content Info</b></p>
                {{$row->content_title}}
                <br>
                {{$row->content_description}}
                <br>
                <br>
                <p><b>Uploader Info</b></p>
                <a class="e_login" href="{{url('view_profile/'.$row->content_user_id)}}">{{$row->user_name}}</a>
                <br>
                {{$row->user_institution}}
                <br>
                <br>
           
                <p><b>Posted</b></p>
                {{$row->content_created_at}}
                <br>
                <p><b>Modified</b></p>
                {{$row->content_updated_at}}
                <br>
                <br>
                <a href="{{url('/download'. $row->content_file)}}">Click to Download</a>
                <br> 
            </div>

        </div>
        @endforeach
    </div>  

    <div class="info_class">
    <div class="info">
        <h2>Profile Information</h2>
        <ul>
        <li><a href="{{url('profile_info')}}"><i class="fa-solid fa-user"></i> Followers</a></li>
        <li><a href="{{url('profile_info')}}"><i class="fa-regular fa-user"></i> Followings</a></li>
        <li><a href="{{url('profile_info')}}"><i class="fa-solid fa-dollar-sign"></i> Subscribers</a></li>
        <li><a href="{{url('profile_info')}}"><i class="fa-solid fa-dollar-sign"></i> Subscriptions</a></li>
        </ul>
    </div>

</div>



</div>

</body>

</html>