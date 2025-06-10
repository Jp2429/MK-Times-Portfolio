<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" 
   content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MK-Times</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous">
    <style>
        body {
            background-color: #FFF9E5;
            font-family: 'Lucida Console', monospace;
        }
        .logo-img {
            width: auto;
            max-width: none;
            height: 350px;
            object-fit: contain;
            padding: 0;
            margin: 0 auto;
            display: block;
        }
        .navbar{
            background-color:rgb(24, 24, 25) !important;
        }
        .container-fluid{
            background-color:rgb(24, 24, 25) !important;

        }
    </style>
  </head>
  <body>
    <div>       
        <div class="container-fluid bg-dark text-white p-5 mb-4" style="margin-top: -30px; height: 300px;">
            <div class="col text-center">
                    <img src="img/logo.png" alt="MK-Times Logo" class="logo-img">
            </div>
            <!--
            <div class="row">
                <div class="col text-center">
                    <img src="img/logo2.png" alt="MK-Times Logo" class="logo-img">
                </div>
            </div>
             !-->
             <!-- Not Needed for now, but can be used later for a logo.
        <div class="row">
            <div class="col text-center">
                <h1 class="display-4">MK-Times</h1>
            </div>

        </div>
        -->
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-sm-row sticky-top shadow p-3 mb-5 bg-white" style="margin-top:-30px;">
        <div class="container-fluid w-100 p-0">
            <div class="row w-100 flex-column">
                <div class="col-12 d-flex justify-content-end align-items-center" style="font-size: 0.9rem;">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                <?php
		                            echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";
		                        ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                                <li><a class="dropdown-item" href="orders.php">Order History</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-12 d-flex justify-content-center mt-0 pt-0">
                    <ul class="navbar-nav mx-auto flex-row" style="font-size: 1.2rem; padding: 0 20px; padding-bottom: 20px;">
                        <li class="nav-item active mr-4">
                            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ml-4">
                            <a class="nav-link" href="products.php">Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

