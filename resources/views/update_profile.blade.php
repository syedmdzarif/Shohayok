<html>
<h1>Update Profile</h1>


<form action="/update_profile" method="POST" class="form_box">
                @csrf

                <p>Name</p>
                <input type="text" placeholder="Enter your name" name="name" value="{{$data['name']}}"/>
                

                <p>Email</p>
                <input type="email" placeholder="Enter your email address" name="email" value="{{$data['email']}}"/>
                
                <p>Institution</p>
                <select name="institution" value="{{$data['institution']}}">
                    <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                    <option value="United International University">United International University</option>
                    <option value="North South University">North South University</option>
                    <option value="Dhaka University">Dhaka University</option>
                </select>
                
                <p>Password</p>
                <input type="password" placeholder="Enter your password" name="password" value="{{$data['password']}}"/>
                
                <button type="submit">Update</button>

</form>

</html>