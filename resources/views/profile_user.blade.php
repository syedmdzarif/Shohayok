<html>
<h1>user profile</h1>
{{\Auth::user()->id}}
{{\Auth::user()->name}}
{{\Auth::user()->institution}}

<a href="{{url('/upload_content')}}">Upload Content
<a href="{{url('/newsfeed')}}">Newsfeed
<a href="{{url('/upload_history')}}">Upload History
<a href="{{'update_profile'}}">Update Profile
<a href="{{url('/logout')}}">Logout

</html> 
