<html>

<h1>Edit Content</h1>

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


</html>