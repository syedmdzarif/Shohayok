<html>
<h1>user profile</h1>
{{\Auth::user()->id}}
{{\Auth::user()->name}}
{{\Auth::user()->institution}}

<a href="{{url('/upload_content')}}">Upload Content
<a href="{{url('/logout')}}">Logout

</html> 
