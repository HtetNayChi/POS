<?php
	require'backendheader.php';
	require'connection.php';
	//$id=$_GET['id'];
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

	//var_dump($user['profile']); die();
    
   
?>

<div class="app-title">
                <div>
                    <h1> <i class="icofont-id-card"></i> Personal Information </h1>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="user_update.php" method="POST" enctype="multipart/form-data">
                            	<?php


						if(isset($_SESSION['update_success'])){ ?>

							<div class="alert alert-danger d-flex align-items-center" role="alert">
							 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							  <div>
							    <?= $_SESSION['update_success']; ?>
							  </div>
							</div> 
						<?php } unset($_SESSION['update_success']); 

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
                                <div class="form-group row mx-2 my-5">
                                 <div class="col-sm-4 mx-4 pr-5">
                                 	<img src="<?=$user['profile'] ?>" alt="logo" width="150" height="145">
                                 	<input class="mt-5"type="file" id="photo_id" name="photo">
                                 </div>
                                 <div class="col-sm-7">
                                 	<div class="form-group row my-1 mb-3 ">
                                			<div class="col-sm-12">
											  <div class="row">
											    <div class="col-4">
											      <label for="id"  class=" col-form-label ">ID : </label>
											    </div>
											    <div class="col-8">
											      <input type="text" class="form-control-plaintext" id="id"readonly value="<?=$user['id']?>">
											    </div>
											  </div>
											
											</div>
                                	
                                	
                                	</div>
                                	<div class="form-group row my-1 mb-3 ">
                                			<div class="col-sm-12">
											  <div class="row">
											    <div class="col-4">
											      <label for="role_name" class=" col-form-label ">Position : </label>
											    </div>
											    <div class="col-8">
											      <input type="text" class="form-control-plaintext" readonly value="<?=$user['rname']?>">
											    </div>
											  </div>
											
											</div>
                                	
                                	
                                	</div>
                                	
                                	<div class="form-group row my-1 mb-3">
                                		<label for="name_id" class="col-sm-4 col-form-label"> Name : </label>
                                	<div class="col-sm-6">
                                		<input type="text" class="form-control" id="name_id" name="name" value="<?=$user['name']?>">
                                		
                                	</div>
                                	</div>
                                	<div class="form-group row my-1 mb-3">
	                                	<label for="name_id" class="col-sm-4 col-form-label"> Email </label>
	                                    <div class="col-sm-6">
	                                      <input type="text" class="form-control" id="name_id" name="email" value="<?=$user['email']?>">
	                                    </div>
                                	</div>
                                	<div class="form-group row my-1 mb-3">
	                                	 <label class="col-sm-4 col-form-label" for="inputPassword">Password</label>
	                                	 <div class="col-sm-6">
				                              <input class="form-control " id="inputPassword" type="password" placeholder="Enter password" name="password" value="<?=$user['password']?>"/>
				                              <font id="error" color="red"></font>
			                          	</div>
                                	</div>
                                	<div class="form-group row my-1 mb-3 ">
	                                	 <label class="col-sm-4 col-form-label" for="inputConfirmPassword">Confirm Password</label>
	                                	 <div class="col-sm-6">
				                              <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
				                              <font id="cerror" color="red"></font>
				                         </div>
                                	</div>
                                	<div class="form-group row my-1 mb-3">
                                		<label for="phone" class="col-sm-4 col-form-label"> Phone : </label>
                                	<div class="col-sm-6">
                                		<input type="text" class="form-control" id="name_id" name="phone" value="<?=$user['phone']?>">
                                		
                                	</div>
                                	</div>
                                	<div class="form-group row my-1 mb-3 ">
	                                	 <label for="address" class="col-sm-4 col-form-label"> Address : </label>
	                                	 <div class="col-sm-6">
				                               <textarea class="form-control" id="address" rows="3" name="address" ><?=$user['address']?></textarea>
				                         </div>
                                	</div>
                                	<div class="form-group row">
                                		<div class="col-sm-8"></div>
                                    <div class="col-sm-4 ">
                                        <button type="submit" class="btn btn-primary ">
                                            <i class="icofont-save"></i>
                                            Update
                                        </button>
                                    </div>
                                </div>

                                	
                                </div>
                            </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
	require'backendfooter.php';
?>
