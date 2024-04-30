<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Website</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Bootstrap
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- Custom Css -->
    <link rel="stylesheet" href="index.css">

    <?php
    //require functions.php file
    require('function.php');
    ?>

</head>
<body>

<!-- header section -->

<header class="header">

    <div class="header-1">
        <a href="#" class="logo"><img src="assets/logo/logo1.png" alt=""></a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fa-solid fa-heart"></a>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="index.php#home">Home</a>
            <a href="index.php#featured">Featured</a>
            <a href="index.php#arrivals">Arrivals</a>
            <a href="index.php#reviews">Reviews</a>
            <a href="index.php#blogs">Blogs</a>
            <a href="catalog.php">Catalog</a>
            <a href="orders.php">Orders</a>
        </nav>
    </div>

</header>

<!-- !header section -->


<!-- bottom navbar -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fa-solid fa-blog"></a>
</nav>

<!-- !bottom navbar -->


<!-- login form -->

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times">

    </div>
    <?php
    if(isset($_POST['login'])){
        foreach($product->getData("user") as $user){
            if($user['username'] == $_POST['user'] && $user['password'] == $_POST['pass']){
                if($user['access'] == "consumer"){
                    $expiration = time() + (86400 * 30); // 30 days from now
                    // setcookie(name, value, expiration);
                    unset($_COOKIE['user_id']);
                    setcookie("user_id", $user['user_id'], $expiration);
                    // $user_id = $user['user_id'];
                    header("Location: index.php");
                    exit;
                }
                if($user['access'] == "admin"){
                    $expiration = time() + (86400 * 30); // 30 days from now
                    // setcookie(name, value, expiration);
                    unset($_COOKIE['user_id']);
                    setcookie("user_id", $user['user_id'], $expiration);
                    // $user_id = $user['user_id'];
                    header("Location: adminpanel.php");
                    exit;
                }
            }
        }
    }

    ?>
    <form method="post">
        <h3>Sign Up</h3>
        <span>Username</span>
        <input type="text" name="user" class="box" placeholder="Enter your Username" id="username">
        <span>Password</span>
        <input type="password" name="pass" class="box" placeholder="Enter your Password" id="password">
        <input type="submit" name="login" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">click here</a></p>
    </form>

</div>

<!-- !login form -->
