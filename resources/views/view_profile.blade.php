<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/view_profile.css">
    <title>View User</title>
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
        <h2>View User</h2>
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

<div class="upper">

<div class="pfp_box">

@foreach($user_info as $info)


<?php 
if($info->user_pfp == ""){
?>
<img height="220px" width="200px" src=' /assets/profile_pictures/default_pfp.png'> </img>
<?php

}
else{
?>
<img height="220px" width="200px" src=' /assets/profile_pictures/{{$info->user_pfp}}'> </img>
<?php
}
?>

</div>

<div class="details_box">






@break
@endforeach

<p class="name">{{$info->user_name}}</h1></p>

<p class="institute">{{$info->user_institution}}</p>

<p class="bio">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words. </p>




<br>


<?php

$flag_follow = 0;
$flag_following = 0;
$flag_sub=0;

?>

@foreach($followers as $follower)

    @if($follower->follower_id == Auth::user()->id && $follower->user_id == $profile_id)

        <?php

        $flag_follow = 1;

        ?>
        
    @else

        <?php

        $flag_follow = 0;

        ?>
        
    @endif

@endforeach

@foreach($followings as $following)

    @if($following->following_id == $profile_id && $following->user_id == Auth::user()->id)

        <?php

        $flag_following = 1;

        ?>
        
    @else

        <?php

        $flag_following = 0;

        ?>
        
    @endif

@endforeach

@foreach($subs as $sub)

    @if($sub->subscriber_id == Auth::user()->id && $sub->subscribed_to_id == $profile_id)

        <?php

        $flag_sub = 1;

        ?>
        
    @else

        <?php

        $flag_sub = 0;

        ?>
        
    @endif

@endforeach


@if($flag_follow == 1)
<button><a href="{{url('remove_follower/'.$profile_id)}}"><b>Unfollow</b></a></button>
@else
<button><a href="{{url('follower_add/'.$profile_id)}}"><b>Follow</b></a></button>
@endif

@if($flag_following == 1)
<button><a href="{{url('remove_following/'.$profile_id)}}"><b>Stop Notifications</b></a></button>
@else
<button><a href="{{url('add_following/'.$profile_id)}}"><b>Notifications</b></a></button>
@endif

@if($flag_sub == 1)
<button><a href="{{url('support_remove/'.$profile_id)}}"><b>Unsubscribe</b></a></button>
@else
<button><a href="{{url('support_form/'.$profile_id)}}"><b>Subscribe</b></a></button>
@endif


</div>

</div>

<div class="feed">



<h2>Contents uploaded</h2>
<br>



@foreach($data as $row)
<div class="box_each">
    
 

    <div class="img">
        
        <iframe height="500px" width="500px" src=' /assets/{{$row->content_file}}'> </iframe>
        <br>
        
    </div>

    <div class="details">
    
        <b>{{$row->content_title}}</b>
        <br>
        
        {{$row->content_description}}
        <br>
        <label class="created">{{$row->content_created_at}}</label>
        <br>
       
        <a class="download" href="{{url('/download'. $row->content_file)}}"><label class="download">Download</label></a>
        <br>
        
    </div>
</div>

    @endforeach

</div>
</div>



<div class="info_class">
    <div class="info">
        <h2>Courses</h2>
        <ul>
        @foreach($courses as $row)
        @if($row->course_id == "")
        <li><p>No courses </p></li>
        @else
        <li><a href="{{url('/view_course_specific_from_profile/'. $row->course_id)}}">{{$row->course_title}}</a></li>
        @endif
        @endforeach
        </ul>
    </div>
</div>
</body>
</html>