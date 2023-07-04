<html>
    <body>

    <h1>
        find content
    </h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>

    <form action={{'find_content'}} >
        <label> Search </label>
        <input type="search" name="search" id=""  value="{{$search}}">
        <button>Search</button>

        <a href="{{url('find_content')}}">
            <button type="button">Reset</button>
        </a>
    </form>

    <table>


    @foreach($data as $row)
    
    

        <tr>
        <td>{{$row->content_title}}</td>
        <td>{{$row->user_name}}</td>
        <td>{{$row->user_institution}}</td>
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
        <td>{{$row->content_file}}</td>
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->content_file}}'> </iframe></td>


        <td>
        @foreach($comments as $comment)
            @if($comment->comment_content_id == $row->content_id && $comment->comment_type=='content')
            <a class="e_login" href="{{url('view_profile/'.$comment->comment_user_id)}}"><label class="commenter">{{$comment->comment_user_name}}: </lable></a><br><label class="commenter">{{$comment->comment}}</label><label class="created_at"> - {{$comment->comment_created_at}}</label></label>
            <br>
            @endif
        @endforeach
        </td>
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>

   

    @endforeach

    </table>

    <div class="links">

    <br>
        {{$data->links()}}
       
    
    </div>

    <!-- to get rid of big pagination arrow -->
    <style>
        .w-5{
            display:none;
        }
    </style>

    </body>

</html>