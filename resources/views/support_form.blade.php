<html>
<h1>support_form</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>

<form action="{{url('/create_support')}}" method="post" enctype="multipart/form-data">

    @csrf
    <label>The subscriber fee is a monthly fee paid to the user in order to show your support. Please note that you can unsubscribe from this plan at any time.</label>
    <br>
    <input type="hidden" name="user_id" value={{$user_id}}>
    <input type="text" name="fee" placeholder="Enter amount">
    <button type="submit">Add Subscription</button>

<form>

</html>