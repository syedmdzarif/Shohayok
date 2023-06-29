<html>

    <h1>chat</h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>
    <table>
    @foreach($users as $row)

        <tr>
        <td>{{$row->user_id}}</td>
    
        <td><a class="e_login" href="{{url('send_message/'.$row->user_id)}}">{{$row->user_name}}</a></td>
 
        <td>{{$row->user_institution}}</td>
        <td>{{$row->user_email}}</td>
       
   
        </tr>

    @endforeach
    </table>

</html>