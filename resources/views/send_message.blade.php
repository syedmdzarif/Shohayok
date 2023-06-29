<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/send_message.css">
    <title>Conversation</title>
</head>
<body>

<header id="main-header">
    <div class="container">
        <h1>Shohayok</h1>
        <!-- <h6>For the students, by the students<h6> -->
    </div>
</header>

<div class="wrapper">
    <div class="sidebar">
        <h2>Conversation</h2>
        <ul>
            <li><a href="{{url('/profile_user')}}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{url('/upload_content')}}"><i class="fa-solid fa-cloud-arrow-up"></i> Upload Content</a></li>
            <li><a href="{{url('/newsfeed')}}"><i class="fa-solid fa-square-rss"></i> Newsfeed</a></li>
            <li><a href="{{url('/find_content')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Content</li>
            <li><a href="{{url('/upload_history')}}"><i class="fa-solid fa-file"></i> Upload History</li>
            <li><a href="{{url('/chat')}}"><i class="fa-solid fa-comment"></i> Chat</a></li>
            <li><a href="{{'update_profile'}}"><i class="fa-solid fa-user"></i> Update Profile</li>
            <li><a href="{{url('/view_users')}}"><i class="fa-solid fa-magnifying-glass"></i> Find People</li>
            <li><a href="{{url('/notifications')}}"><i class="fa-sharp fa-solid fa-bell fa-shake"></i> Notifications</li>
            <li><a href="{{url('/create_course')}}"><i class="fa-solid fa-plus"></i> Create Course</li>
            <li><a href="{{url('/enrolled_courses')}}"><i class="fa-solid fa-file"></i> Enrolled Courses</li>
            <li><a href="{{url('/find_course')}}"><i class="fa-solid fa-magnifying-glass"></i> Find Courses</li>
            <li><a href="{{url('/my_courses')}}"><i class="fa-solid fa-file"></i> My Courses</li>
            <li><a href="{{url('/logout')}}"><i class="fa-solid fa-xmark"></i> Logout</a></li>
        </ul>
    </div>
</div>

<div class="main_content">

        <div class="feed">

            

  

                    <table>
                        @foreach($sent as $row)
                           
                                    <tr>

                                    <?php
                                        if($row->r_id == Auth::user()->id){
                                    ?>
                                    
                                        <td class="row_1">
                                                <b><label class="to">{{$r_name[0]->other_name}}:</label></b><label class = "time"> &nbsp&nbsp{{$row->time}} </label><br> {{$row->message}} 
                                                <br> 
                                                <?php
                                                if ($row->file != ""){
                                                ?>
                                                <a href="{{url('/download'. $row->file)}}"><label class="time">Click to Download</label></a>
                                                <br>
                                                <iframe height="500px" width="500px" src=' /assets/{{$row->file}}'> </iframe>
                                                
                                                
                                                <?php
                                                }
                                                ?>
                                        </td>

                                 
                                    
                                    <?php
                                        }

                                        else{
                                            ?>
                                            
                                            <td class="row_2">
                                            <b><label class="from">You:</label></b> &nbsp&nbsp<label class = "time">{{$row->time}}</label> <br> {{$row->message}}
                                            <br> 
                                            <?php
                                            if ($row->file != ""){
                                            ?>
                                            <a href="{{url('/download'. $row->file)}}"><label class="time">Click to Download</label></a>
                                            <br>
                                            <iframe height="500px" width="500px" src=' /assets/{{$row->file}}'> </iframe>
                                            
                                            
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            
                                        }

                                        ?>
                                        </td>

                                  

                                    
                                    </tr>
                       
                        @endforeach
                    </table>


                    

         </div>



         <div class="info_class">
            <div class="info">

                <h2> {{$r_name[0]->other_name}}</h2>
            
      
                
                <form action="{{url('/send_message_backend')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="receiver_id" value={{$receiver_id}}>
                    <input type="text" name="message" placeholder="Type in your message">
                    <input type="file" name="file">

                    <button type="submit">Send Message</button>

                <form>
            </div>

        </div>

</div>

</body>

</html>