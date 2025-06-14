<style>
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
    include 'includes/mainNav.php';
    # Open database connection.
    require ( 'connect_db.php' ) ;
    # Retrieve items from 'shop' database table.
    $q = "SELECT * FROM products" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {
    # Display body section.
    echo '<div class="container">
        <h1 class="mt-5 text-align center">Our Collection</h1>
        <p class="lead">Timeless Designs. Crafted to Impress.</p>
        <p>Explore our exclusive range of premium watches — from bold, modern chronographs to elegant classic timepieces. Each watch in our collection has been carefully selected for its quality, design, and craftsmanship.</p>
        <p>Whether you are after a sophisticated accessory for formal occasions or a durable companion for everyday wear, you will find the perfect fit right here. Add it to your cart, and make it yours.</p>
        <div class="row" style="margin-top: 20px;">';
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '
        <div class="col-md-4 d-flex justify-content-center">
            <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem; min-width: 22.5rem; padding: 20px;">
                <img src="'. $row['item_img'].'" class="card-img-top" alt="watch">
                <div class="card-body" style>
                    <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
                    <p class="card-text">'. $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark "><a class="btn btn-dark btn-lg btn-block border border-white" href="added.php?id='.$row['item_id'].'">  Add to Cart</a> </li>
                </ul>
            </div>
        </div>';
    }
    echo '</div></div>';
    # Close database connection.
    mysqli_close( $link ) ; 
    }
    # Or display message.
    else { echo '<p>There are currently no items in this table.</p>' ; }
    include 'includes/footer.php';

?>