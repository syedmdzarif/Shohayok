<html>
<a class="e_login" href="{{url('profile_user')}}">Home</a>


<h1>

@foreach($data as $row)

{{$data[0]->user_name}}
<br>
{{$data[0]->user_email}}
<br>
{{$data[0]->user_institution}}
<br>


<button><a href="{{url('add_following/'.$data[0]->user_id)}}">Follow</a><a href="{{url('remove_following/'.$data[0]->user_id)}}">/Unfollow</a></button>

<button><a href="{{url('add_follower/'.$data[0]->user_id)}}">Notifications</a><a href="{{url('remove_follower/'.$data[0]->user_id)}}">/Stop Notifications</a></button>

<button><a href="{{url('support_form/'.$data[0]->user_id)}}">Subscribe</a><a href="{{url('support_remove/'.$data[0]->user_id)}}">/Unsubscribe</a></button>
<?php
break;

?>

@endforeach


</h1>

@foreach($data as $row)
    
    <table>

        <tr>
        <td>{{$row->content_title}}</td>
        
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
        <td>{{$row->content_file}}</td>
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>

    </table>

    @endforeach
</html>