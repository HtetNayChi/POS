<?php	
	session_start();
	require'connection.php';

	$carts= $_POST['cart'];
	$note = $_POST['note'];
	$total = $_POST['total'];

	date_default_timezone_set("Asia/Rangoon");

	$orderdate= date("Y-m-d");

	$voucherno= strtotime(date("Y-m-d h:i:s"));

	$userid=$_SESSION['login_user']['id'];

	$status= '0';

	var_dump($orderdate);
	var_dump($voucherno);
	var_dump($total);
	var_dump($status);
	var_dump($userid);


	$sql = 'INSERT INTO orders (orderdate ,voucherno, total,note,status ,user_id) VALUES (:orderdate,:voucherno,:total,:note,:status,:user_id)';
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':orderdate',$orderdate);
	$statement->bindParam(':voucherno',$voucherno);
	$statement->bindParam(':total',$total);
	$statement->bindParam(':note',$note);
	$statement->bindParam(':status',$status);
	$statement->bindParam(':user_id',$userid);
	
	$statement->execute();

	$orderid=$pdo->lastInsertId();

	foreach ($carts as $cart) {
		$qty= $cart['qty'];
		$itemid=$cart['id'];

	$sql= 'INSERT INTO item_order (qty, item_id, order_id) VALUES (:v1, :v2,:v3)';

	$statement=$pdo->prepare($sql);
	$statement->bindParam(':v1',$qty);
	$statement->bindParam(':v2',$itemid);
	$statement->bindParam(':v3',$orderid);
	$statement->execute();
	}

	$rows=$statement->rowCount();
	return $rows;

?> 