<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signup_login.css">
    <title>Document</title>
</head>
<body>

    <form>
        <label>Name</label>
        <input type="text" placeholder="Enter your name" name="name"/>
        <br> 

        <label>Email</label>
        <input type="email" placeholder="Enter your email address" name="email"/>
        <br> 
          
        <label>Institution</label>
        <select name="institution">
            <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
            <option value="United International University">United International University</option>
            <option value="North South University">North South University</option>
            <option value="Dhaka University">Dhaka University</option>
        </select>
        
        <br>  
        <label>Password</label>
        <input type="password" placeholder="Enter your password" name="password"/>
        
        <br> 
        <label>Confirm Password</label> 
        <input type="password" placeholder="Confirm Password" name="password"/>
        <a href="{{url('/login')}}"><text style="color:#666666; font-size: 11px; margin-left:40px">Already have an account? Log In!</text></a>
        <button type="submit">Sign Up</button>
    </form>

</body>
</html>