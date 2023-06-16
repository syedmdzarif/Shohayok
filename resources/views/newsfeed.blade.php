<html>
<h1>newsfeed</h1>


    @foreach($data as $row)
    
    <table>

        <tr>
        <td>{{$row->title}}</td>
        <td>{{$row->description}}</td>
        <td>{{$row->file}}</td>
        <td><iframe height="400px" width="400px" src=' /assets/{{$row->file}}'> </iframe></td>
        <!-- <td><iframe src = "{{ asset($row->file) }}" > </iframe></td> -->
        
        <td><a href="{{url('/download'. $row->file)}}">Download</a></td>
        </tr>

    </table>

    @endforeach

  



</html>