<style>
    #home-container{
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
        padding: 20px;
        border-radius: 15px;
    }
    .card{
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
    }
    .card:hover{
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.5s;
        transform: scale(1.05);
    }
    .list-group-item{
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
    }
    .btn {
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
    }
    .col-md-4{
        padding: 20px;
    }
</style>
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<?php
    include ( 'includes/mainNav.php' ) ;
?>
<div class="container">
    <h1 class="mt-5 text-align center">Welcome to MK-Times!</h1>
    <p class="lead">Where Timeless Elegance Meets Modern Precision</p>
    <p>Discover a curated collection of luxury and lifestyle watches crafted for every occasion. At MK-Times, we believe a watch is more than just a timekeeper — it's a statement of style, identity, and ambition.</p>
    <p>Browse our handpicked selection of classic and contemporary designs, add your favourites to your cart, and enjoy a smooth, secure checkout experience. Whether you're looking to elevate your everyday look or searching for the perfect gift, you'll find a timepiece that fits your story.</p>
    <p>Explore. Select. Own the moment — only at MK-Times.</p><br>
    
</div>
<div class="container" style="margin-top: 20px;">
    <h2 class="mt-5">Featured Collections</h2>
    <p class="lead">View some of our best sellers</p>
</div>
    
<?php
# Display 3 random products on the home page in the same style as the products page
require('connect_db.php');
$q = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    echo '<div class="container" style="margin-top: 20px;">';
    echo '<div class="row">';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-md-4 d-flex justify-content-center">
            <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem; min-width: 23rem; padding: 50px;">
                <img src="' . $row['item_img'] . '" class="card-img-top" alt="watch">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="added.php?id=' . $row['item_id'] . '">  Add to Cart</a> </li>
                </ul>
            </div>
        </div>';
    }
    echo '</div>';
    echo '<div class="text-center mb-5">';
    echo '<h2 class="mt-5">Explore More</h2>';
    echo '<p class="lead">Discover our full range of products</p>';
    echo '<a href="products.php" class="btn btn-primary btn-lg mt-3">View All Products</a>';
    echo '</div>';
    echo '</div>';
}
mysqli_close($link);
?>
<?php
include ('includes/footer.php');
?>