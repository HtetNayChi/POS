<?php
	require 'connection.php';
	
	$name=$_POST['name'];
	$category_id=$_POST['category'];
	$id=$_POST['id'];

	echo($category_id);
	//image/category/cat.jpg
	
	$sql= "UPDATE subcategories SET sub_name=:name,category_id=:c_id WHERE sub_id=:id";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':c_id',$category_id);
	$statement->bindParam(':id',$id);
	$statement->execute();

	header('location:SUBcategory_list.php');
	
	
?>