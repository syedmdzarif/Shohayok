<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/view_users.css">
    <title>Find Users</title>
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
        <h2>Find Users</h2>
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
   <div class="table_allign">
    <table  class="table" >
        
        <tr>
  
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th>Institution</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            

            <td>
                <?php 
                if($user['profile_picture'] == ""){
                ?>
                <img height="200px" width="190px" src=' /assets/profile_pictures/default_pfp.png'> </img>
                <?php

                }
                else{
                ?>
                <img height="200px" width="190px" src=' /assets/profile_pictures/{{$user['profile_picture']}}'> </img>
                <?php
                }
                ?>
            </td>

            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['institution']}}</td>
            <td><a class="e_login" href="{{url('view_profile/'.$user->id)}}">View Profile</a></td>
        </tr>
        @endforeach
    </table>

    </div>

    <div class="links">

    <br>
        {{$users->links()}}
       
    
    </div>

    <!-- to get rid of big pagination arrow -->
    <style>
        .w-5{
            display:none;
        }
    </style>

    </div>

    <div class="info_class">
    <div class="info">
        <h2>Search </h2>
    
        <form action={{'view_users'}} >
        
            <input type="search" name="search" id="" placeholder = "Search users by name, institute"  value="{{$search}}">
            <button><b>Search User</b></button>
            <br>
         
           

            <a href="{{url('view_users')}}">
                <label class="reset">Cancel Search</label>
            </a>
        </form>
    
    </div>

</div>
</body>
</html>