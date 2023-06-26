<html>

<table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Institution</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['institution']}}</td>
        </tr>
        @endforeach
    </table>
</html>