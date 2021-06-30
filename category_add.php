<?php
	include 'connection.php';
	$name=$_POST['name'];
	$photo=$_FILES['photo'];

	//image/category/cat.jpg

	//var_dump($photo);
	$source_dir='image/category/';

	// Changing the file name into random 

	$filename  =  mt_rand(100000,999999);
	$file_array= explode('.', $photo['name']);
	$file_exe=$file_array[1];

	// image/category/22222.jpg
	$filepath = $source_dir.$filename.'.'.$file_exe;

	move_uploaded_file($photo['tmp_name'], $filepath);

	//var_dump($photo);

	$sql= "INSERT INTO categories (name,logo) VALUES (:name,:logo)";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':logo',$filepath);
	$statement->execute();


	header('location:category_list.php');

	
?>