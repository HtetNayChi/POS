<?php
	require 'connection.php';
	$id=$_POST['id'];
	$sql = 'DELETE FROM items Where id=:id';
	$statement =$pdo->prepare($sql);
	$statement->bindParam(':id', $id);
	$statement->execute();

	header('location:item_list.php');

	

?>S