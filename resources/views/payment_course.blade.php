<html>
<h1>
payment
</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>
<?php
$c_id = '';

?>

<table>

@foreach($data as $row)
    
    <?php
    $c_id = $row->course_id;
    ?>

    <tr>
    <td><label><b>Payment To: </b></label>{{$row->course_teacher_name}}</td>
    </tr>
    <tr>
    <td><label><b>Course Title: </b></label>{{$row->course_title}}</td>
    <tr>
    </tr>
    <tr>
    <td><label><b>Fee: </b></label>{{$row->course_fee}}.00 BDT</td>
    </tr>

@endforeach

</table>

<br>

<br>

<table>
<td>
    <tr>
        <lable>Please choose one of the mentioned payment options</label>
        <td>
        <input style="cursor: pointer;" type="radio" id="male" name="gender" value="Male">
        </td>
        <td>
        <label for="male">Bkash</label>
        </td>
        <td>
        <input style="cursor: pointer" type="radio" id="female" name="gender" value="Female">
        </td>
        <td>
        <label for="female">Nagad</label>
        </td>
        <td>
        <input style="cursor: pointer;" type="radio" id="others" name="gender" value="Others">
        </td>
        <td>
        <label style="cursor: pointer" for="others">Rocket</label>
        </td>
    </tr>
</table>


<input type="text" name="transaction_id" placeholder="Enter the transaction ID">
<a href="{{url('course_enroll/'.$c_id)}}">
    <button type="button">Pay</button>   
</a>

</html>