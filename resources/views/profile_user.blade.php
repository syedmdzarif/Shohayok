<html>
<h1>user profile</h1>
{{\Auth::user()->id}}
{{\Auth::user()->name}}
{{\Auth::user()->institution}}

<br>
<br>

<a href="{{url('/upload_content')}}">Upload Content
<br>
<a href="{{url('/newsfeed')}}">Newsfeed
<br>
<a href="{{url('/find_content')}}">Find Content
<br>
<a href="{{url('/upload_history')}}">Upload History
<br>
<a href="{{'update_profile'}}">Update Profile
<br>
<a href="{{url('/view_users')}}">Find People
<br>
<a href="{{url('/notifications')}}">Notifications
<br>

<a href="{{url('/create_course')}}">Create Course
<br>
<a href="{{url('/enrolled_courses')}}">Enrolled Courses
<br>
<a href="{{url('/find_course')}}">Find Courses
<br>
<a href="{{url('/my_courses')}}">My Courses
<br>
<a href="{{url('/logout')}}">Logout
<br>

</html> 
