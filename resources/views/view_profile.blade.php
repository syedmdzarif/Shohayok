<html>
<a class="e_login" href="{{url('profile_user')}}">Home</a>










@foreach($data as $row)


<?php 
if($data[0]->user_profile_picture == ""){
?>
<img height="240px" width="240px" src=' /assets/profile_pictures/default_pfp.png'> </img>
<?php

}
else{
?>
<img height="240px" width="240px" src=' /assets/profile_pictures/{{$data[0]->user_profile_picture}}'> </img>
<?php
}
?>


<h1>
{{$data[0]->user_name}}
<br>
{{$data[0]->user_email}}
<br>
{{$data[0]->user_institution}}
</h1>


<br>



<button><a href="{{url('add_following/'.$data[0]->user_id)}}">Follow</a><a href="{{url('remove_following/'.$data[0]->user_id)}}">/Unfollow</a></button>

<button><a href="{{url('add_follower/'.$data[0]->user_id)}}">Notifications</a><a href="{{url('remove_follower/'.$data[0]->user_id)}}">/Stop Notifications</a></button>

<button><a href="{{url('support_form/'.$data[0]->user_id)}}">Subscribe</a><a href="{{url('support_remove/'.$data[0]->user_id)}}">/Unsubscribe</a></button>
<?php
break;

?>

@endforeach




<table>

@foreach($data as $row)
    
 

        <tr>
        <td>{{$row->content_title}}</td>
        
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
        <td>{{$row->content_file}}</td>
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>



    @endforeach

    </table>
</html>