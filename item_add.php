<?php
	require 'connection.php';
	$code=$_POST['codeno'];
	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['subcategory'];
	

	//image/category/cat.jpg

	//var_dump($photo);
	$source_dir='image/items/';

	// Changing the file name into random 

	$filename  =  mt_rand(100000,999999);
	$file_array= explode('.', $photo['name']);
	$file_exe=$file_array[1];

	// image/category/22222.jpg
	$filepath = $source_dir.$filename.'.'.$file_exe;

	move_uploaded_file($photo['tmp_name'], $filepath);

	//var_dump($photo);
	//echo $name;
	//echo "<br>";
	//var_dump($filepath);

	//echo "<br>";
	//echo $price;
	//echo "<br>";
	//echo $discount;
	//echo "<br>";
	//echo $description;
	//echo "<br>";
	//echo $brand;
	//echo "<br>";
	//echo $subcategory;
	//echo "<br>";
	

	$sql= "INSERT INTO items (codeno, name, photo, price, discount, description, brand_id, subcategory_id) VALUES (:code,:name, :photo,:price,:discount,:description,:brand_id,:subcategory_id)";

	$statement= $pdo->prepare($sql);
	$statement->bindParam(':code',$code);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':photo',$filepath);
	$statement->bindParam(':price',$price);
	$statement->bindParam(':discount',$discount);
	$statement->bindParam(':description',$description);
	$statement->bindParam(':brand_id',$brand);
	$statement->bindParam(':subcategory_id',$subcategory);
	$statement->execute();
	header('location:item_list.php');

?>