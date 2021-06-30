<?php
	$dbname='mysql:host=localhost;dbname=b21_pos';
	$user='root';
	$password= '';
	$pdo = new PDO($dbname,$user,$password);
try{

		// set the PDO Error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// echo "Connected Successfully.";

	}catch(PDOException $e){
		echo "Connection Failed ".$e->getMessage();
	}
?>