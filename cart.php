<style>
  .card{
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
    }
</style>
<?php # DISPLAY SHOPPING CART PAGE.

# Set page title and display header section.
include ('includes/session-cart.php');

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

if (isset($_POST['remove'])) {
    foreach ($_POST['remove'] as $remove_id => $val) {
        unset($_SESSION['cart'][$remove_id]);
    }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.
  require ('connect_db.php');
  
  # Retrieve all items in the cart from the 'products' database table.
  $q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($link, $q);

  # Display body section with a form and a table.
  echo '<section class="h-100 h-custom" style="min-height: 100vh; box-sizing: border-box; padding-bottom: 220px; overflow-x: hidden;">
  <div class="container py-6 h-50" style="padding: 20px;">
    <h1 class="mt-5 text-align center">Your Cart</h1>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Items</h1>
                    
                  </div>
                  <hr class="my-4">
					<form action="cart.php" method="post">';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<div class=\"row mb-12 d-flex justify-content-between align-items-center\" style=\"border-bottom: 2px solid #fff; padding-bottom: 1.5rem; margin-bottom: 1.5rem;\">\n
           <div class=\"col-md-2 col-lg-2 col-xl-2\">
            <img src=\"{$row['item_img']}\"
                 class=\"img-fluid rounded-3\" 
                 alt=\"watch\">
            </div>
            <div class=\"col-md-3 col-lg-3 col-xl-4 \">
             <h6 class=\"text-muted\">Watch</h6>
             <h6 class=\"text-black mb-0\">{$row['item_name']}</h6>
            </div>
            <div class=\"col-md-3 col-lg-3 col-xl-2 d-flex\">
             <input type=\"text\" size=\"3\" name=\"qty[{$row['item_id']}]\" value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\"></td>
            </div>            
            <div class=\"col-md-3 col-lg-2 col-xl-3\">
            <h6 class=\"mb-0\"> £".number_format ($subtotal, 2)."</h6> 
            </div>
            <div class=\"col-md-1 col-lg-1 col-xl-1 d-flex align-items-center\">
                <button type=\"submit\" name=\"remove[{$row['item_id']}]\" class=\"btn btn-link p-0 m-0\" style=\"color: #fff; font-size: 1.5rem; line-height: 1;\" title=\"Remove\">&times;</button>
            </div>
            </div>\n\n";
			 
  }
  
  # Close the database connection.
  mysqli_close($link); 
  
  # Display the total.
  echo '        </div> <!-- closing .p-5 for cart items -->
            </div> <!-- closing .col-lg-8 -->
            <div class="col-lg-4 bg-grey ">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">
                  <h5 class="text-uppercase">Total price</h5>
                  <h5 data-cy="totalPrice">&pound '.number_format($total,2).'</h5>
                  <input type="submit" name="submit" class="btn btn-dark btn-block mt-4" value="Update My Cart">
                  <a href="checkout.php?total='.$total.'" data-cy="checkOutButton" class="btn btn-primary btn-block mt-2">CHECKOUT : &pound'.number_format($total,2).'</a>
                </div> <!-- closing .p-5 for summary -->
            </div> <!-- closing .col-lg-4 -->
          </div> <!-- closing .row g-0 -->
        </div> <!-- closing .card-body p-0 -->
      </div> <!-- closing .card card-registration-2 -->
    </div> <!-- closing .col-12 -->
  </div> <!-- closing .row d-flex -->
</div> <!-- closing .container -->
</div>
</form>';
}
else
# Or display a message.
{ echo '<div class="alert alert-secondary" role="alert" style="margin: 20px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p>Your cart is currently empty.</p>
				</div>
		</div>' ; }


# Display footer section.
include ( 'includes/footer.php' ) ;