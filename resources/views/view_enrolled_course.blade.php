<html>

    <h1>course content history</h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>

    {{$data[0]->course_title}}
    {{$data[0]->user_name}}
    <table>

    @foreach($data as $row)

        <tr>
        <td>{{$row->content_title}}</td>
 
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_file}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
   
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>

    @endforeach
    </table>

</html>