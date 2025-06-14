<style>
  .container {
	margin-top: 20px;
    min-height: 10vh;
    
  }
  .row{
    background-color:rgb(24, 24, 25) !important;
    color: white !important;
  }
  #order-row:hover{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.5s;
    transform: scale(1.1);
  }
  .col{
    background-color:rgb(24, 24, 25) !important;
    color: white !important;
  }
</style>
<?php
    # $_SESSION[user_id]
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
    $q = "SELECT o.order_id, o.order_date,p.item_img, p.item_name, p.item_desc, oc.quantity, p.item_price AS price
        FROM orders o
        JOIN order_contents oc ON o.order_id = oc.order_id
        JOIN products p ON oc.item_id = p.item_id
        WHERE o.user_id = $_SESSION[user_id];" ;
    $r = mysqli_query( $link, $q ) ;
    # Display body section.
    if ( mysqli_num_rows( $r ) > 0 )
    {
    echo '<div class="container mt-5">
            <h1 class="mb-4">Your Orders</h1>';
    while ( $row = mysqli_fetch_assoc( $r ))
    {
        $subtotal = $row['price'] * $row['quantity'];
        echo '<div class="row mb-4 d-flex justify-content-between align-items-center rounded shadow p-3" id="order-row">
                <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                  <img src="' . $row['item_img'] . '" alt="' . htmlspecialchars($row['item_name']) . '" class="img-fluid rounded-3" style="max-width: 150px; max-height: 150px;">
                </div>
                <div class="col-md-5 col-lg-5 col-xl-5">
                  <h6 class="text-muted">Product</h6>
                  <h6 class="text-black mb-0" data-cy="itemName">' . $row['item_name'] . '</h6>
                  <p class="text-muted small">' . $row['item_desc'] . '</p>
                </div>
                
                <div class="col-md-5 col-lg-5 col-xl-5 text-center">
                    <div class="d-flex justify-content-center align-items-center mb-3" style="column-gap: 5.5rem;">
                        <div>
                            <h6 class="mb-1 mt-3">Order Date</h6>
                            <h6 class="mb-0 text-muted">' . date('d M Y', strtotime($row['order_date'])) . '</h6>
                        </div>
                        <div>
                            <h6 class="mb-1 mt-3">Quantity</h6>
                            <h6 class="mb-0 text-muted">' . $row['quantity'] . '</h6>
                            <h6 class="mb-1 mt-3">Price</h6>
                            <h6 class="mb-0 text-muted">&pound;' . number_format($row['price'], 2) . '</h6>
                            <h6 class="mb-1 mt-3">Subtotal</h6>
                            <h6 class="mb-0 text-muted">&pound;' . number_format($subtotal, 2) . '</h6>
                        </div>
                    </div>
                </div>
                
              </div>';
    }
    echo '      </div>' ;
    # Close database connection.
    mysqli_close( $link ) ; 
    }
    # Or display message.
    else { echo '<div class="container mt-5">
                    <div class="alert alert-info">You have no orders yet.</div>
                </div>' ; }
    include ('includes/footer.php');

?>