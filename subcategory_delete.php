<?php
	require 'connection.php';
	$id=$_POST['id'];

	$sql = 'DELETE FROM subcategories Where sub_id=:id';
	$statement =$pdo->prepare($sql);
	$statement->bindParam(':id', $id);
	$statement->execute();

	header('location:subcategory_list.php');


?>