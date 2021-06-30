<?php
	include 'connection.php';
	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	$id = $_POST['id'];
	$oldlogo=$_POST['oldlogo'];

	//image/category/cat.jpg

	//var_dump($photo);
	$source_dir='image/category/';
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

	

	//var_dump($photo);

	$sql= "Update categories SET name=:name,logo=:logo WHERE id=:id";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':logo',$filepath);
	$statement->bindParam(':id',$id);
	$statement->execute();


	header('location:category_list.php');

	
?>