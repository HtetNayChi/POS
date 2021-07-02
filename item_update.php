<?php
	include 'connection.php';

	$codeno=$_POST['codeno'];
	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	$id = $_POST['id'];
	$oldlogo=$_POST['oldlogo'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['subcategory'];

	//echo'<br> Code';
	//var_dump($codeno);
	// echo'<br> Name';
	// var_dump($name);
	// echo'<br> id';
	// var_dump($id);
	// echo'<br> price';
	// var_dump($price);
	// echo'<br> discount';
	// var_dump($discount);
	// echo'<br> description';
	// var_dump($description);
	// echo'<br>';
	// var_dump($brand,$subcategory);

	//image/category/cat.jpg

	//var_dump($photo);
	$source_dir='image/item/';
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

	

	var_dump($filepath);

	$sql= "UPDATE items 
			SET 
			codeno=:codeno,
			name=:name,
			photo=:photo,
			price=:price,
			discount=:discount,
			description=:description,
			brand_id=:brand,
			subcategory_id=:subcategory 
			WHERE id=:id";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':codeno',$codeno);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':photo',$filepath);
	$statement->bindParam(':price',$price);
	$statement->bindParam(':discount',$discount);
	$statement->bindParam(':description',$description);
	$statement->bindParam(':brand',$brand);
	$statement->bindParam(':subcategory',$subcategory);
	$statement->bindParam(':id',$id);

	$statement->execute();


	header('location:item_list.php');

	
?>