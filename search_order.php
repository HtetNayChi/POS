<?php

 require 'connection.php';

 
 $startdate=$_GET['startDate'];

 $active = 0;

 $sql='SELECT orders.* 
    FROM orders 
    INNER JOIN users 
    ON orders.user_id=users.id
    WHERE users.status=:v1
    AND orders.created_at=:v2';

 $statement = $pdo->prepare($sql);
 $statement->bindParam(':v1',$active);
 $statement->execute();
 $orders=$statement->fetchAll();

?>