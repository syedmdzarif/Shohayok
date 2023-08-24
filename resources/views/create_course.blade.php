<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/upload_content.css">
    <title>Upload Content</title>
</head>
<body>


<div class="whole">

<div class="form">



<form action="{{url('/create_course_backend')}}" method="post" enctype="multipart/form-data">

    @csrf
    <input type="text" name="title" placeholder="Enter course title">
    <input type="text" name="description" placeholder="Enter desctiption">
    <input type="text" name="fee" placeholder="Enter enrollment fee">
    &nbsp&nbsp<button type="submit">Create</button>

<form>
<a href="{{url('/profile_user')}}"><label class="back">Go back</label></a>

</div>

<div class ="pic">

</div>

</div>

</body>

</html>
