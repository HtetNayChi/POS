<?php
	require 'frontendheader.php';
	require'connection.php';
	//$id=$_GET['id'];
//session_start();

	$id=$_GET['id'];

	$active = 0;

	$sql = 'SELECT users.*, roles.name as rname FROM users 
			INNER JOIN model_has_roles ON users.id = model_has_roles.user_id
			INNER JOIN roles ON model_has_roles.role_id = roles.id
			WHERE users.id=:value1
			AND status=:value3';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':value1', $id);
	$statement->bindParam(':value3', $active);
	$statement->execute();

	$user = $statement->fetch(PDO::FETCH_ASSOC);
	//var_dump($user['id']); die();
?>
<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white">Edit Personal Information </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	
		    	<li class="breadcrumb-item active">
		    		<a href="#" class="text-decoration-none secondarycolor"> Personal Information </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?= $user['name'] ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
				<img src="<?= $user['profile'] ?>" class="img-fluid">
			</div>	


			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-5 pt-5 px-5">
				<form action="user_update.php" method="POST" enctype="multipart/form-data">
				<?php

						if(isset($_SESSION['update_fail'])){ ?>

							<div class="alert alert-danger d-flex align-items-center" role="alert">
							 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <div>
							    <?= $_SESSION['update_fail']; ?>
							  </div>
							</div> 
						<?php } unset($_SESSION['update_fail']); ?>?>
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <input type="hidden" name="oldlogo" value="<?=$user['profile']?>">
				<div class="form-group row my-1 ">
					<div class="col-sm-3 mt-2 pl-3">
						<label class="  text-end"> Name : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="text" class="form-control" id="name_id" name="name" value="<?=$user['name']?>">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				
				<br>
				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						<label class="  text-end"> Phone : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="text" class="form-control" id="phone" name="phone" value="<?=$user['phone']?>">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						<label class="  text-end"> Email : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="text" class="form-control" id="email" name="email" value="<?=$user['email']?>">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						<label class="  text-end"> Password : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="password" class="form-control" id="password" name="password" value="<?=$user['password']?>">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						<label class="  text-end"> Confirm Password : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="password" class="form-control" id="password" name="confirm" value="">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						<label class="  text-end"> Address : </label>
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<input type="text" class="form-control" id="address" name="address" value="<?=$user['address']?>">   		
					</div>
					<div class="col-sm-3">
					</div>
				</div>

				<div class="form-group row my-1 mb-3 ">
					<div class="col-sm-3 my-2 pl-3">
						
					</div>
					
					<div class="col-sm-6 mx-3 px-0">
						<button type="submit" class="btn mainfullbtncolor btn-secondary float-right">
                        <i class="icofont-edit"></i>
						Update
                        </button>
						
					</div>
					<div class="col-sm-3">
						
					</div>
				</div>
				
			</form>
			</div>
	
				
				
			</div>
		</div>

		
<?php
	require 'frontendfooter.php';
?>