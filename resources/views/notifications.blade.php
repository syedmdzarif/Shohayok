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
            <td><a href={{'view_notification_content/'.$notification->id}}>Open</a></td>
            <?php
                }
                elseif($notification->type == 'course'){
            ?>
            <td><a href={{'course_notification_view/'.$notification->id}}>Open</a></td>
            <?php

                }

                elseif($notification->type == 'follow'){
                    ?>
                    <td><a href={{'view_profile/'.$notification->uploader_id}}>Open</a></td>
                    <?php
        
                }

                elseif($notification->type == 'sub'){
                            ?>
                            <td><a href={{'view_profile/'.$notification->uploader_id}}>Open</a></td>
                            <?php
                
                }
                elseif($notification->type == 'comment'){
                    ?>
                     <td><a href={{'view_notification_content/'.$notification->id}}>Open</a></td>
                    <?php
        
                }
                elseif($notification->type == 'create_course'){
                    ?>
                    <td><a href={{'find_course'}}>Open</a></td>
                    <?php
        
                }

                else{
                    ?>
            <td><a href={{'send_message/'.$notification->uploader_id}}>Open</a></td>
            <?php

                }
            ?>
         
            <td><a href={{'notification_delete'.$notification->id}}>Delete</a></td>
            
        </tr>
@endforeach




</table>

<br>
<a href={{'clear_notifications'}}>Clear Notifications</a>

</html>