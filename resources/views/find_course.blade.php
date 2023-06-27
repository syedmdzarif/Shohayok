<html>

    <h1>
        find course
    </h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>

    <form action={{'find_course'}} >
        <label> Search </label>
        <input type="search" name="search" id=""  value="{{$search}}">
        <button>Search</button>

        <a href="{{url('find_course')}}">
            <button type="button">Reset</button>
        </a>
    </form>

    <table>


    @foreach($data as $row)
    
    

        <tr>
        <td>{{$row->course_title}}</td>
        <td>{{$row->course_teacher_name}}</td>
        <td>{{$row->course_teacher_institution}}</td>
        <td>{{$row->course_description}}</td>
        <td>{{$row->course_created_at}}</td>
        <td>{{$row->course_updated_at}}</td>
        <td>{{$row->course_fee}}</td>
        <td><a class="e_login" href="{{url('payment_course/'.$row->course_id)}}">Enroll</a></td>
    
        
        
      
        </tr>

   

    @endforeach

    </table>

</html>