<html>
<h1>upload page</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>
<h3>{{\Auth::user()->name}}</h3>


<form action="{{url('/upload_backend')}}" method="post" enctype="multipart/form-data">

    @csrf
    <input type="text" name="title" placeholder="Enter content title">
    <input type="text" name="description" placeholder="Enter desctiption">
    <input type="file" name="file" placeholder="Choose file">
    <button type="submit">Upload</button>

<form>

</html>

