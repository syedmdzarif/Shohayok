<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login_bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="left">
            
            <div class = "form_box">
                <form>
                    <!-- <div class="title">
                        <h2>Log In</h2>
                    </div> -->
                    
                    <p>Email</p>
                    <input type="text" placeholder="Enter your email" name="email"/>
                    
                    
                    <p>Password</p>
                    <input type="password" placeholder="Enter your password" name="password"/>

                    <!-- <div class= "forgot_pass">
                        <a href="#"><text style="color:#666666; font-size: 11px; margin-left:80px">Forgot Password</text></a>
                    </div -->
                       
                    <div class="create_account">
                        <a href="{{url('/signup')}}"><text style="color:#666666; font-size: 11px;">Create a new account for free!</text></a>
                    </div>
                    <br>
                    <button type="submit">Log In</button>
                    
                </form>
            </div>

        </div>

        <div class="right">


        </div>

    </div>

</body>
</html>