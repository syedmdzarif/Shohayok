<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/homepage.css">
    <title>Shohayok</title>
</head>
<body>

    <header id="main-header">
        <div class="container">
            <h1>Shohayok</h1>
            <!-- <h6>For the students, by the students<h6> -->
        </div>
    </header>


    <nav id="navbar">
        <div class="container">
            <ul>
                <a class="w_signup" href="{{url('/about_us')}}">About Us</a>
                <a class="e_signup" href="{{url('/login_admin')}}">Admin</a>
                <a class="w_login" href="{{url('/signup')}}">Sign Up</a>
                <a class="e_login" href="{{url('/login')}}">Log In</a>
            </ul>
        </div>
    </nav>




    <!-- carousel start -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/chef.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/driver.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/gardener.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/delivery.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slide5.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- carousel end -->


<footer>
    Shohayok
    <br>
    All Rights Reserved 2023
</footer>


    <script src="//code.tidio.co/lwti145od7qa7ywsah1mwzznor3txctr.js" async></script>

    
</body>
</html>