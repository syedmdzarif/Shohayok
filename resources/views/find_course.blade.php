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

        <?php
            $flag = 0;
        ?>
    
    

        <tr>
        <td>{{$row->course_id}}</td>
        <td>{{$row->course_title}}</td>
        <td>{{$row->course_teacher_name}}</td>
        <td>{{$row->course_teacher_institution}}</td>
        <td>{{$row->course_description}}</td>
        <td>{{$row->course_created_at}}</td>
        <td>{{$row->course_updated_at}}</td>
        <td>{{$row->course_fee}}</td>


        
        

        @foreach($sub as $value)
                <?php
                    if($value->course_id == $row->course_id && $value->learner_id == Auth::user()->id && $row->user_id != Auth::user()->id){
                        $flag = 1;
                        break;
                        
                    }
                    elseif($value->course_id == $row->course_id && $row->user_id == Auth::user()->id){
                        $flag = 2;
                        break;
                    }
                    else{
                        $flag = 0;
                    }
                ?>

        @endforeach




        @if($flag == 1)
        
        <td><a class="e_login" href="{{url('view_enrolled_course/'.$row->course_id)}}">Open</a></td>
        @elseif($flag == 2)
        <td><a href="{{'view_course_contents_specific/'.$row->course_id}}">Edit</a></td>

        @else

        <td><a class="e_login" href="{{url('payment_course/'.$row->course_id)}}">Enroll</a></td>

        @endif
        
        </tr>

        <?php
            $flag = 0;
        ?>

       

    @endforeach

    </table>

</html>