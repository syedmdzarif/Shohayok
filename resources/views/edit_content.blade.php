<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/edit_content.css">
    <title>Upload Content</title>
</head>
<body>


<div class="whole">

<form action="/edit_content" method="POST" class="form_box">
        

    @csrf
    <input type="hidden" name="id" value='{{$data['id']}}'/>
    <p>Enter title</p>
    <input type="text" name="title" placeholder="Enter content title" value="{{$data['title']}}"/>
    <p>Enter description</p>
    <input type="text" name="description" placeholder="Enter desctiption" value="{{$data['description']}}"/>
    <!-- <input type="file" name="file" placeholder="Choose file"> -->
    <Button type = "submit">Save</Button>

<form>


<a href="{{url('/profile_user')}}"><label class="back">Go back</label></a>

</div>

<div class ="pic">

</div>

</div>

</body>

</html>
