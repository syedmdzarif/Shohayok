<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/profile_info.css">
    <title>Profile Info</title>
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
        <h2>Profile Information</h2>
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


    <div class="content_left">


        <div class="content_left_left">
            <h3>Followers</h3>
            <br>
            <ul>
                @foreach($followers as $follower)
                @if($follower->follower_id != Auth::user()->id)
                <li>
                <a class="e_login" href="{{url('view_profile/'.$follower->follower_id)}}">{{$follower->follower_name}}</a>
                </li>  
                @endif 
                @endforeach

            </ul>
        

        </div>

        <div class="content_left_right">
            <h3>Followings</h3>
            <br>
            <ul>
                @foreach($followings as $following)
                @if($following->following_id != Auth::user()->id)
                <li>
                <a class="e_login" href="{{url('view_profile/'.$following->following_id)}}">{{$following->following_name}}</a>
                </li>  
                @endif 
                @endforeach

            </ul>

        </div>
    

    </div>

    <div class="content_right">

        <div class="content_right_left">
            <h3>Subscribers</h3>
            <br>
            
            <ul>
                @foreach($subscribers as $subscriber)
                <li>
                <a class="e_login" href="{{url('view_profile/'.$subscriber->subscriber_id)}}">{{$subscriber->subscriber_name}} <br> {{$subscriber->subscriber_fee}}.00 BDT</a>
                </li>   
                @endforeach

            </ul>
           

        </div>

        <div class="content_right_right">
            <h3>Subscriptions</h3>
            <br>
            <ul>
                @foreach($subscribed_to as $sb_to)
                <li>
                <a class="e_login" href="{{url('view_profile/'.$sb_to->subscribed_to_id)}}">{{$sb_to->subscribed_to_name}} <br> {{$sb_to->subscribed_to_fee}}.00 BDT</a> 
                </li>   
                @endforeach

            </ul>

        </div>
    

    </div>


</div>


    
</body>
</html>




