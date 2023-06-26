<html>

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
        
        
        <td><a href="{{url('/download'. $row->content_file)}}">Download</a></td>
        </tr>

   

    @endforeach

    </table>

</html>