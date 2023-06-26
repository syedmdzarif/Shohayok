<html>


<h1>

{{$data[0]->user_name}}
<br>
{{$data[0]->user_email}}
<br>
{{$data[0]->user_institution}}
<br>

</h1>

@foreach($data as $row)
    
    <table>

        <tr>
        <td>{{$row->content_title}}</td>
        
        <td>{{$row->content_description}}</td>
        <td>{{$row->content_created_at}}</td>
        <td>{{$row->content_updated_at}}</td>
        <td>{{$row->content_file}}</td>
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->content_file}}'> </iframe></td>
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>

    </table>

    @endforeach
</html>