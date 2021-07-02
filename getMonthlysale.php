<?php

	require'connection.php';

	//January

	$janfirst=strtotime('first day of January');
	$janlast=strtotime('last day of January');

	$janStart=date('Y-m-d',$janfirst);
	$janEnd=date('Y-m-d',$janlast);

	$active=0;

	$sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$janStart);
    $statement->bindParam(':v3',$janEnd);
    $statement->execute();
    $janResult=$statement->fetch(PDO::FETCH_ASSOC);

    //var_dump($janResult);

    //February

    $febfirst=strtotime('first day of February');
	$feblast=strtotime('last day of February');

	$febStart=date('Y-m-d',$febfirst);
	$febEnd=date('Y-m-d',$feblast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$febStart);
    $statement->bindParam(':v3',$febEnd);
    $statement->execute();
    $febResult=$statement->fetch(PDO::FETCH_ASSOC);

    //March

    $marchfirst=strtotime('first day of March');
    $marchlast=strtotime('last day of March');

    $marchStart=date('Y-m-d',$marchfirst);
    $marchEnd=date('Y-m-d',$marchlast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$marchStart);
    $statement->bindParam(':v3',$marchEnd);
    $statement->execute();
    $marchResult=$statement->fetch(PDO::FETCH_ASSOC);

       //April

    $aprilfirst=strtotime('first day of April');
    $aprillast=strtotime('last day of April');

    $aprilStart=date('Y-m-d',$aprilfirst);
    $aprilEnd=date('Y-m-d',$aprillast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$aprilStart);
    $statement->bindParam(':v3',$aprilEnd);
    $statement->execute();
    $aprilResult=$statement->fetch(PDO::FETCH_ASSOC);

    //May

    $mayfirst=strtotime('first day of May');
    $maylast=strtotime('last day of May');

    $mayStart=date('Y-m-d',$mayfirst);
    $mayEnd=date('Y-m-d',$maylast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$mayStart);
    $statement->bindParam(':v3',$mayEnd);
    $statement->execute();
    $mayResult=$statement->fetch(PDO::FETCH_ASSOC);

    //june

    $junefirst=strtotime('first day of June');
    $junelast=strtotime('last day of June');

    $juneStart=date('Y-m-d',$junefirst);
    $juneEnd=date('Y-m-d',$junelast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$juneStart);
    $statement->bindParam(':v3',$juneEnd);
    $statement->execute();
    $juneResult=$statement->fetch(PDO::FETCH_ASSOC);

    //july

    $julyfirst=strtotime('first day of July');
    $julylast=strtotime('last day of July');

    $julyStart=date('Y-m-d',$julyfirst);
    $julyEnd=date('Y-m-d',$julylast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$julyStart);
    $statement->bindParam(':v3',$julyEnd);
    $statement->execute();
    $julyResult=$statement->fetch(PDO::FETCH_ASSOC);

    //august

    $augustfirst=strtotime('first day August');
    $augustlast=strtotime('last day of August');

    $augustStart=date('Y-m-d',$augustfirst);
    $augustEnd=date('Y-m-d',$augustlast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$augustStart);
    $statement->bindParam(':v3',$augustEnd);
    $statement->execute();
    $augustResult=$statement->fetch(PDO::FETCH_ASSOC);

    //september

    $septemberfirst=strtotime('first day of September');
    $septemberlast=strtotime('last day of September');

    $septemberStart=date('Y-m-d',$septemberfirst);
    $septemberEnd=date('Y-m-d',$septemberlast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$septemberStart);
    $statement->bindParam(':v3',$septemberEnd);
    $statement->execute();
    $septemberResult=$statement->fetch(PDO::FETCH_ASSOC);

    //october

    $octoberfirst=strtotime('first day of October');
    $octoberlast=strtotime('last day of October');

    $octoberStart=date('Y-m-d',$octoberfirst);
    $octoberEnd=date('Y-m-d',$octoberlast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$octoberStart);
    $statement->bindParam(':v3',$octoberEnd);
    $statement->execute();
    $octoberResult=$statement->fetch(PDO::FETCH_ASSOC);

    //november

    $novemberfirst=strtotime('first day November');
    $novemberlast=strtotime('last day of November');

    $novemberStart=date('Y-m-d',$novemberfirst);
    $novemberEnd=date('Y-m-d',$novemberlast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$novemberStart);
    $statement->bindParam(':v3',$novemberEnd);
    $statement->execute();
    $novemberResult=$statement->fetch(PDO::FETCH_ASSOC);

    //december

    $decemberfirst=strtotime('first day of December');
    $decemberlast=strtotime('last day of December');

    $decemberStart=date('Y-m-d',$junefirst);
    $decemberEnd=date('Y-m-d',$junelast);

    $sql='SELECT COALESCE(SUM(orders.total),0) AS total
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$decemberStart);
    $statement->bindParam(':v3',$decemberEnd);
    $statement->execute();
    $decemberResult=$statement->fetch(PDO::FETCH_ASSOC);



   $total =array(

    $janResult['total'],
    $febResult['total'],
    $marchResult['total'],
    $aprilResult['total'],
    $mayResult['total'],
    $juneResult['total'],
    $julyResult['total'],
    $augustResult['total'],
    $septemberResult['total'],
    $octoberResult['total'],
    $novemberResult['total'],
    $decemberResult['total']
   );

   //var_dump($total);
    echo json_encode($total);
?>