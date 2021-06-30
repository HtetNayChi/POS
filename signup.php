<?php

	require'connection.php';
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];

	$status=0;
	$profile='image/user.png';
	$roleid=2;

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

	header('location:login.php');

?>