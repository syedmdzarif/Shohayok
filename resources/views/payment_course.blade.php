<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/payment.css">
    <title>Profile Info</title>
</head>
<body>


<?php
$c_id = '';

?>

<div class="main_box">

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

<table class="pay">

    <tr>
        <lable>Please choose one of the mentioned payment options</label>
        <td>
        <input  type="radio" id="male" name="gender" value="Male">
        </td>
        <td>
        <label for="male">Bkash</label>
        </td>
</tr><tr>
        <td>
        <input  type="radio" id="female" name="gender" value="Female">
        </td>
        <td>
        <label for="female">Nagad</label>
        </td>
        </tr>
        <tr>
        <td>
        <input  type="radio" id="others" name="gender" value="Others">
        </td>
        <td>
        <label for="others">Rocket</label>
        </td>
        </tr>
    </tr>
</table>


<input type="text" name="transaction_id" placeholder="Enter the transaction ID">
<a href="{{url('course_enroll/'.$c_id)}}">
    <button type="button">Pay</button>   
</a>

</div>

</body>
</html>