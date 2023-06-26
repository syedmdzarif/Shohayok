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
            <td><a href={{'notification_delete'.$notification->id}}>Delete</a></td>
            
        </tr>
@endforeach

</table>

</html>