<?php
	include 'connection.php';
	session_start();
	$id=$_POST['id'];
	$oldlogo=$_POST['oldlogo'];
	$photo=$_FILES['photo'];
	$phone=$_POST['phone'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$confirm=$_POST['confirm'];
	

	// echo'<br> ID';
	// var_dump($id);
	// echo'<br> Name';
	// var_dump($name);
	// echo'<br> email';
	// var_dump($email);
	// echo'<br> password';
	// var_dump($password);
	// echo'<br> address';
	// var_dump($address); die();
	// echo'<br> description';
	// var_dump($description);
	// echo'<br>';
	// var_dump($brand,$subcategory);

	//image/category/cat.jpg

	//var_dump($photo);
	$source_dir='image/profile/';
	if(isset($photo) && $photo['size']>0)
	{
		$filename  =  mt_rand(100000,999999);
		$file_array= explode('.', $photo['name']);
		$file_exe=$file_array[1];

		// image/category/22222.jpg
		$filepath = $source_dir.$filename.'.'.$file_exe;
		move_uploaded_file($photo['tmp_name'], $filepath);

		unlink($oldlogo);
	}else{
		$filepath=$oldlogo;
	}
	if($password ==$confirm){
	$sql= "UPDATE users 
			SET 
			name=:name,
			profile=:photo,
			phone=:phone,
			email=:email,
			password=:password,
			address=:address
			WHERE id=:id";

	$statement= $pdo->prepare($sql);

	$statement->bindParam(':name',$name);
	$statement->bindParam(':photo',$filepath);
	$statement->bindParam(':phone',$phone);
	$statement->bindParam(':email',$email);
	$statement->bindParam(':password',$password);
	$statement->bindParam(':address',$address);
	$statement->bindParam(':id',$id);

	$authuser=$statement->execute();

	
	if($authuser['rname']=='Admin'){
			$_SESSION['update_success']="You have successfully updated. 😇😇 ";
			header('location:user_detail.php?id='.$id);
		}else{
			$_SESSION['update_success']="You have successfully updated. 😇😇 ";
			header('location:customer_detail.php?id='.$id);
			
		}

	}else{
		
		

		if($authuser['rname']=='Admin'){

			$_SESSION['update_fail']="Update Fail ! You password and confirm password is not the same😫😫";
			
			header('location:user_detail.php?id='.$id);
		}else{
			$_SESSION['update_fail']="Update Fail ! You password and confirm password is not the same😫😫 ";

			header('location:user_edit.php?id='.$id);
			
		}
	}

	

	
?>