<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signup_bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="left">

            <form action="" method="POST" class="form_box">
                @csrf

              

                    <p>Name</p>
                    <input type="text" placeholder="Enter your name" name="name"/>
                    

                    <p>Email</p>
                    <input type="email" placeholder="Enter your email address" name="email"/>
                    
                    
                    <p>Institution</p>
                    <select name="institution">
                        <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                        <option value="United International University">United International University</option>
                        <option value="North South University">North South University</option>
                        <option value="Dhaka University">Dhaka University</option>
                    </select>
                    
                  
                    <p>Password</p>
                    <input type="password" placeholder="Enter your password" name="password"/>
                    
                   
                    <a href="{{url('/login')}}"><text style="color:#666666; font-size: 11px; margin-left:86px">Log In to your existing account</text></a>
                    <button type="submit">Sign Up</button>

                

        

            </form>

        </div>

        <div class="right">


        </div>

        
    </div>


    

</body>
</html>