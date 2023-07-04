<html>
    <h1>upload history</h1>
    <a class="e_login" href="{{url('profile_user')}}">Home</a>
    <table>
    @foreach($data as $row)
    


        <tr>
        <td>{{$row->content_title}}</td>
        <td>{{$row->user_name}}</td>
        <td>{{$row->user_institution}}</td>
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_file}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
        <td>{{$row->content_file}}</td>
        <td><iframe height="100px" width="100px" src=' /assets/{{$row->content_file}}'> </iframe></td>

        <td>
        @foreach($comments as $comment)
            @if($comment->comment_content_id == $row->content_id && $comment->comment_type=='content')
            <a class="e_login" href="{{url('view_profile/'.$comment->comment_user_id)}}"><label class="commenter">{{$comment->comment_user_name}}: </lable></a><br><label class="commenter">{{$comment->comment}}</label><label class="created_at"> - {{$comment->comment_created_at}}</label></label>
            &nbsp&nbsp<a class="e_login" href="{{url('comment_delete/'.$comment->comment_id)}}"><label class="commenter">Delete</label></a>
            
            <br>

            @endif
        @endforeach
        </td>
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        <td><a href={{'delete'.$row->content_id}}>Delete</a></td>
        <td><a href={{'edit_content/'.$row->content_id}}>Edit Post</a></td>
        </tr>

    

    @endforeach
    </table>


</html>