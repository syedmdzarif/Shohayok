<html>
<h1>create course</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>



<form action="{{url('/create_course_backend')}}" method="post" enctype="multipart/form-data">

    @csrf
    <input type="text" name="title" placeholder="Enter course title">
    <input type="text" name="description" placeholder="Enter desctiption">
    <input type="text" name="fee" placeholder="Enter enrollment fee">
    <button type="submit">Create</button>

<form>

</html>