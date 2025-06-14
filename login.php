<style>
	.container {
		margin: 50px;
		min-height: 10vh;
		
        color: white !important;
	}
	.card-header{
		background-color:rgb(24, 24, 25) !important;
        color: white !important;
	}
	.card-body{
		background-color:rgb(24, 24, 25) !important;
        color: white !important;
	}
	.card{
		background-color:rgb(24, 24, 25) !important;
		color: white !important;
	}
	.btn {
        background-color:rgb(24, 24, 25) !important;
        color: white !important;
    }
</style>
<?php 
include ( 'includes/nav.php' ) ;
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="alert alert-secondary text-align center" role="alert" style="margin: 20px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p id="err_msg">Oops! There was a problem:<br>' ;
 				foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 				echo 'Please try again or <a href="register.php">Register</a></p>
				</div>
		</div>' ;
  
}
?>

<!-- Display body section. -->
<div class="container " style="padding: 40px;">
<div class="row ">
 <div class="col-sm ">
   <div class="card bg mb-3 shadow p-3 mb-5 rounded border border-white">
	<div class="card-header"><h1>Login</h1></div>
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
			   placeholder="* Enter Password">
		</div>
		<input type="submit" 
		       class="btn btn-dark btn-lg btn-block border border-white" 
			   value="Login">
	 </form>
	</div><!-- closing card-body -->
	</div><!-- closing card -->
   </div><!-- closing col-sm -->
  </div><!-- closing row -->
</div>
</div><!-- closing container -->
<?php
include ('includes/footer.php');
?>