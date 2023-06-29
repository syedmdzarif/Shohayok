<html>
<h1>
Notifications
</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>

<table>
@foreach($notifications as $notification)
        <tr>
            <td>{{$notification->message}}</td>
            <td>{{$notification->created_at}}</td>
            <?php
                if($notification->type == 'content'){
            ?>
            <td><a href={{'view_notification_content/'.$notification->id}}>View</a></td>
            <?php
                }
                elseif($notification->type == 'course'){
            ?>
            <td><a href={{'course_notification_view/'.$notification->id}}>View</a></td>
            <?php

                }
                else{
                    ?>
            <td><a href={{'send_message/'.$notification->uploader_id}}>View</a></td>
            <?php

                }
            ?>
         
            <td><a href={{'notification_delete'.$notification->id}}>Delete</a></td>
            
        </tr>
@endforeach

</table>

</html>