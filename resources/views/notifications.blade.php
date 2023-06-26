<html>
<h1>
Notifications
</h1>

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