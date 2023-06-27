<html>
<h1>enrolled_courses</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>

    <table>
    @foreach($data as $row)
    
    <tr>
    <td>{{$row->course_title}}</td>
    <td>{{$row->course_teacher_name}}</td>
    <td>{{$row->course_teacher_email}}</td>
    <td>{{$row->course_teacher_institution}}</td>
    <td>{{$row->course_description}}</td>

    <td><a class="e_login" href="{{url('course_content/'.$row->course_id)}}">Open</a></td>
    </tr>

    @endforeach
    </table>

</html>