<?php
	
	require'connection.php';
	session_start();
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$confirm=$_POST['confirm'];

	$status=0;
	$profile='image/user.png';
	$roleid=2;

	if($password ==$confirm){

	$sql='INSERT INTO users (name, profile,phone, email, password,address, status) VALUES(:name, :profile,:phone, :email, :password, :address, :status)';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':profile',$profile);
	$statement->bindParam(':phone',$phone);
	$statement->bindParam(':email',$email);
	$statement->bindParam(':password',$password);
	$statement->bindParam(':address',$address);
	$statement->bindParam(':status',$status);
	$statement->execute();

	if($statement){
	$sql='SELECT * FROM users ORDER By id DESC';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);


	$userid=$user['id'];

	$sql='INSERT INTO model_has_roles (user_id,role_id) values (:user,:role)';
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':user',$userid);
	$statement->bindParam(':role',$roleid);
	$statement->execute();
	$_SESSION['reg_success']="You have successfully registered. 😇😇 ";
	header('location:login.php');
	}
	}else{
		$_SESSION['con_fail']="You password and confirm password is not the same😫😫 ";
	header('location:register.php');
	}

?>