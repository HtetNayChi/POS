<?php
	require 'connection.php';
	$name=$_POST['name'];
	$category=$_POST['category'];
	
	$sql= "INSERT INTO subcategories (sub_name,category_id) VALUES (:name,:category)";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':category',$category);
	$statement->execute();


	header('location:subcategory_list.php');

	
?>