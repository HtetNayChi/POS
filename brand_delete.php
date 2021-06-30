<?php
	require 'connection.php';
	$id=$_POST['id'];

	$sql = 'DELETE FROM brands Where brand_id=:id';
	$statement =$pdo->prepare($sql);
	$statement->bindParam(':id', $id);
	$statement->execute();

	header('location:brand_list.php');


?>