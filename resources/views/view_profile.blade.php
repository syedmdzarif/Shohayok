<html>
<a class="e_login" href="{{url('profile_user')}}">Home</a>


@foreach($user_info as $info)


<?php 
if($info->user_pfp == ""){
?>
<img height="240px" width="240px" src=' /assets/profile_pictures/default_pfp.png'> </img>
<?php

}
else{
?>
<img height="240px" width="240px" src=' /assets/profile_pictures/{{$info->user_pfp}}'> </img>
<?php
}
?>


<h1>
{{$info->user_name}}
<br>
{{$info->user_email}}
<br>
{{$info->user_institution}}
</h1>

@break
@endforeach


<br>


<?php

$flag_follow = 0;
$flag_following = 0;
$flag_sub=0;

?>

@foreach($followers as $follower)

    @if($follower->follower_id == Auth::user()->id && $follower->user_id == $profile_id)

        <?php

        $flag_follow = 1;

        ?>
        
    @else

        <?php

        $flag_follow = 0;

        ?>
        
    @endif

@endforeach

@foreach($followings as $following)

    @if($following->following_id == $profile_id && $following->user_id == Auth::user()->id)

        <?php

        $flag_following = 1;

        ?>
        
    @else

        <?php

        $flag_following = 0;

        ?>
        
    @endif

@endforeach

@foreach($subs as $sub)

    @if($sub->subscriber_id == Auth::user()->id && $sub->subscribed_to_id == $profile_id)

        <?php

        $flag_sub = 1;

        ?>
        
    @else

        <?php

        $flag_sub = 0;

        ?>
        
    @endif

@endforeach


@if($flag_follow == 1)
<button><a href="{{url('remove_follower/'.$profile_id)}}">Unfollow</a></button>
@else
<button><a href="{{url('follower_add/'.$profile_id)}}">Follow</a></button>
@endif

@if($flag_following == 1)
<button><a href="{{url('remove_following/'.$profile_id)}}">Stop Notifications</a></button>
@else
<button><a href="{{url('add_following/'.$profile_id)}}">Notifications</a></button>
@endif

@if($flag_sub == 1)
<button><a href="{{url('support_remove/'.$profile_id)}}">Unsubscribe</a></button>
@else
<button><a href="{{url('support_form/'.$profile_id)}}">Subscribe</a></button>
@endif




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