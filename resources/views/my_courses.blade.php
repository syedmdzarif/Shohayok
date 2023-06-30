<html>
<h1>my courses</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>

    <table>
    @foreach($data as $row)
    
    <tr>
    <td>{{$row->course_title}}</td>
    <td>{{$row->course_description}}</td>

    <td><a href="{{'course_content_upload/'.$row->course_id}}">Upload Content</a></td>
    <td><a href="{{'view_course_contents_specific/'.$row->course_id}}">Open</a></td>
    
    

  
    </tr>

    @endforeach
    </table>

</html>