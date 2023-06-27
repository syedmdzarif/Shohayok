<html>

    <h1>course content history</h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>
    <table>
    @foreach($data as $row)

        <tr>
        <td>{{$row->content_title}}</td>
 
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_file}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
   
        <td><iframe height="100px" width="100px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        <td><a href={{'course_content_delete'.$row->content_id}}>Delete</a></td>
        <td><a href={{'edit_course_content/'.$row->content_id}}>Edit Post</a></td>
        </tr>

    @endforeach
    </table>

</html>