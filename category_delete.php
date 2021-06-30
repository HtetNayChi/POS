<?php
	require 'connection.php';
	$id=$_POST['id'];

	$sql = 'DELETE FROM categories Where id=:id';
	$statement =$pdo->prepare($sql);
	$statement->bindParam(':id', $id);
	$statement->execute();

	header('location:category_list.php');


?>