<html>
<body>
    <h1>View Users</h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>

    <form action={{'view_users'}} >
        <label> Search </label>
        <input type="search" name="search" id=""  value="{{$search}}">
        <button>Search</button>

        <a href="{{url('view_users')}}">
            <button type="button">Reset</button>
        </a>
    </form>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Profile Picture</td>
            <td>Name</td>
            <td>Email</td>
            <td>Institution</td>
            <td>Action</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>

            <td>
                <?php 
                if($user['profile_picture'] == ""){
                ?>
                <img height="200px" width="200px" src=' /assets/profile_pictures/default_pfp.png'> </img>
                <?php

                }
                else{
                ?>
                <img height="200px" width="200px" src=' /assets/profile_pictures/{{$user['profile_picture']}}'> </img>
                <?php
                }
                ?>
            </td>

            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['institution']}}</td>
            <td><a class="e_login" href="{{url('view_profile/'.$user->id)}}">Profile</a></td>
        </tr>
        @endforeach
    </table>

    <div>
        {{$users->links()}}
       
    
    </div>

    <!-- to get rid of big pagination arrow -->
    <style>
        .w-5{
            display:none;
        }
    </style>
</body>
</html>