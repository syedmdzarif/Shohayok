<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/update_profile.css">
    <title>Upload Content</title>
</head>
<body>


<div class="whole">


<form action="{{url('/update_profile')}}" method="post" class="form_box" enctype="multipart/form-data">
    @csrf

    <p>Name</p>
    <input type="text" placeholder="Enter your name" name="name" value="{{$data['name']}}">
    

    <p>Email</p>
    <input type="email" placeholder="Enter your email address" name="email" value="{{$data['email']}}">
    
    <p>Institution</p>
    <select name="institution" value="{{$data['institution']}}">
        <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
        <option value="United International University">United International University</option>
        <option value="North South University">North South University</option>
        <option value="Dhaka University">Dhaka University</option>
    </select>

    <p>Profile Picture</p>
    <input type="file" name="profile_picture" placeholder="Choose file"">
    
    <p>Password</p>
    <input type="password" placeholder="Enter your password" name="password" value="{{$data['password']}}">
    
    <button type="submit">Update</button>

</form>

<!-- <a href="{{url('/profile_user')}}"><label class="back">Go back</label></a> -->

</div>

<div class ="pic">

</div>

</div>

</body>

</html>