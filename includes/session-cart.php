<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<style>
    
		.card{
			margin-top: 30px;
			margin-bottom: 20px;

		}
</style>
<?php
  include ('mainNav.php');
?>
<!-- 
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MK-Times</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/bb3ef965c3.js" crossorigin="anonymous"></script>
	
	
	</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>  <?php
		// echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";
		?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
	<li class="nav-item active">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>  View Shopping Cart<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="logout.php">Log Out<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
 -->
<div class="container" style="min-height: 70vh;">
