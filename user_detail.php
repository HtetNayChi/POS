<?php
	require'backendheader.php';
	require'connection.php';
	//$id=$_GET['id'];
	
	

	$id=$_GET['id'];

	$active = 0;
	$role=1;

	$sql = 'SELECT users.*, roles.name as rname FROM users 
			INNER JOIN model_has_roles ON users.id = model_has_roles.user_id
			INNER JOIN roles ON model_has_roles.role_id = roles.id
			WHERE users.id=:value1 AND roles.id=:value2
			AND status=:value3';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':value1', $id);
	$statement->bindParam(':value2', $role);
	$statement->bindParam(':value3', $active);
	$statement->execute();

	$user = $statement->fetch(PDO::FETCH_ASSOC);

	//var_dump($user['profile']); die();
    
   
?>

<div class="app-title">
                <div>
                    <h1> <i class="icofont-id-card"></i> Personal Information </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="category_list.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="item_update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$items['id']?>">
                                <input type="hidden" name="oldlogo" value="<?=$items['photo']?>">
                                <div class="form-group row mx-2 my-5">
                                 <div class="col-sm-3 mx-3 px-5">
                                 	<img src="<?=$user['profile'] ?>" alt="logo" width="150" height="145">
                                 	<input class="mt-5"type="file" id="photo_id" name="photo">
                                 </div>
                                 <div class="col-sm-8 mx-4 px-4">
                                 	<div class="form-group row my-1 mb-3 ">
                                	<label for="user_id" class="col-sm-4 col-form-label "> ID : </label>
                                	<div class="col-sm-6">
                                		<label for="user_id" class="col-sm-2 col-form-label"> <?=$user['id'] ?>&nbsp;&nbsp;(<?=$user['rname'] ?>) </label>
                                	</div>
                                	</div>
                                	<div class="form-group row my-1 mb-3">
                                		<label for="role_name" class="col-sm-4 col-form-label">Position : </label>
                                	<div class="col-sm-8">
                                		<label for="role_name" class="col-sm-2 col-form-label">  <?=$user['rname'] ?> </label>
                                		
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
	                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$user['email']?>">
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
                                		<input type="text" class="form-control" id="name_id" name="name" value="<?=$user['phone']?>">
                                		
                                	</div>
                                	</div>
                                	<div class="form-group row my-1 mb-3 ">
	                                	 <label for="address" class="col-sm-4 col-form-label"> Address : </label>
	                                	 <div class="col-sm-6">
				                               <textarea class="form-control" id="address" rows="3" name="description" ><?=$user['address']?></textarea>
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
