<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Profile</title>
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
        <h2>Home</h2>
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

<div class="pfp_box">


<!-- pfp start -->

<?php
$profile_picture = Auth::user()->profile_picture;
?>

<?php
if($profile_picture == ""){
?>
<img height="220px" width="200px" src=' /assets/profile_pictures/default_pfp.png'> </img>
<?php
}
else{
?>
<img height="220px" width="200px" src=' /assets/profile_pictures/{{$profile_picture}}'> </img>
<?php
}
?>

<!-- pfp end -->

</div>

<div class="details_box">

<p class="name">{{Auth::user()->name}}</h1></p>

<p class="institute">{{Auth::user()->institution}}</p>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words. </p>

</div>


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


    
</body>
</html>




