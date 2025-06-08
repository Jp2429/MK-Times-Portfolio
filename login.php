<?php 
include ( 'includes/nav.php' ) ;
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>

<!-- Display body section. -->
<div class="container">
<div class="row">
 <div class="col-sm">
   <div class="card bg-light mb-3">
	<div class="card-header"><h1>Login</h1>
     <div class="card-body">
	  <form action="login_action.php" method="post">
		<div class="form-group">
		<label for="inputemail">Email</label>
		<input type="text" 
			   name="email" 
			   class="form-control" 
			   required 
			   placeholder="* Enter Email"> 
		</div>
		<div class="form-group">
		<input type="password" 
		       name="pass"  
			   class="form-control" 
			   required 
			   placeholder="* Enter Password"></p>
		</div>
		<input type="submit" 
		       class="btn btn-dark btn-lg btn-block" 
			   value="Login">
	 </div><!-- closing card header -->
	</div><!-- closing card -->
   </div><!-- closing -->
  </div><!-- closing row -->
 </div><!-- closing container-->
</form><!-- closing form -->
<?php
include ('includes/footer.php');
?>	