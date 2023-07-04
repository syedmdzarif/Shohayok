<html>
<h1>view course_comment</h1>
<a class="e_login" href="{{url('profile_user')}}">Home</a>

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
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>
 
            @foreach($comments as $comment)
            <tr>
                
                @if($comment->comment_content_id == $row->content_id && $comment->comment_type == 'course')
                <td>
                    <a class="e_login" href="{{url('view_profile/'.$comment->comment_user_id)}}"><label class="commenter">{{$comment->user_name}}: </lable></a><br><label class="commenter">{{$comment->comment}}</label><label class="created_at"> - {{$comment->comment_created_at}}</label></label>
                </td>
                <td>
                    <a class="e_login" href="{{url('comment_delete/'.$comment->comment_id)}}"><label class="commenter">Delete</label></a>
                </td>
                
                <br>

                @endif
                
            </tr>
            @endforeach

     @endforeach

    </table>

</html>