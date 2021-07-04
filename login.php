<?php 
	require 'frontendheader.php';
?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Login </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-5">

				<form action="signin.php" method="POST">

					<?php

						if(isset($_SESSION['login_fail'])){ ?>

							<div class="alert alert-danger d-flex align-items-center" role="alert">
							 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <div>
							    <?= $_SESSION['login_fail']; ?>
							  </div>
							</div> 
						<?php }unset($_SESSION['login_fail']);

						if(isset($_SESSION['reg_fail'])){ ?>

							<div class="alert alert-danger d-flex align-items-center" role="alert">
							 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <div>
							    <?= $_SESSION['reg_fail']; ?>
							  </div>
							</div> 
						<?php }unset($_SESSION['reg_fail']); 

						if(isset($_SESSION['reg_success'])){ ?>

							<div class="alert alert-secondary d-flex align-items-center" role="alert">
							 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <div>
							    <?= $_SESSION['reg_success']; ?>
							  </div>
							</div> 
						<?php }unset($_SESSION['reg_success']); ?> 
						
					
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputEmailAddress">Email</label>
		      			<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
		      		</div>
		      		
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputPassword">Password</label>
		      			<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
		      		</div>
		      
		      		<div class="form-group">
		          		<div class="custom-control custom-checkbox">
		          			<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
		          			<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>


		          		</div>

		          		<a class="small" href="#">Forgot Password?</a>

		      		</div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
		      		</div>


		  		</form>

		  		<div class=" mt-3 text-center ">
		  			<a href="register.php" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
		  		</div>
			</div>
		</div>
	</div>
<?php 
	require 'frontendfooter.php';
?>