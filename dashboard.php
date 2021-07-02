<?php
  require'backendheader.php';
  require'connection.php';

  date_default_timezone_set('Asia/Rangoon');
  $todaydate=date('Y-m-d');

  $active=0;
  $roleid=2;

  $sql='SELECT count(orders.id) as ordertotal 
    FROM orders 
    INNER JOIN users 
    ON orders.user_id=users.id
    WHERE users.status=:v1
    AND orders.orderdate =:v2';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$todaydate);
    $statement->execute();
    $orderCount=$statement->fetch(PDO::FETCH_ASSOC);


    $sql='SELECT count(users.id) as usertotal 
    FROM users 
    INNER JOIN model_has_roles 
    ON users.id=model_has_roles.user_id
    WHERE users.status=:v1
    AND model_has_roles.role_id =:v2';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$roleid);
    $statement->execute();
    $userCount=$statement->fetch(PDO::FETCH_ASSOC);


    $sql='SELECT count(brand_id) as brandtotal 
    FROM brands ';

    $statement = $pdo->prepare($sql);

    $statement->execute();
    $brandCount=$statement->fetch(PDO::FETCH_ASSOC);


    $sql='SELECT count(id) as itemtotal 
    FROM items ';

    $statement = $pdo->prepare($sql);

    $statement->execute();
    $itemCount=$statement->fetch(PDO::FETCH_ASSOC);



?>
  
       <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <a href="order_list.php" class="text-decoration-none">
        <div class="col-md-6 col-lg-3">
          
            <div class="widget-small primary coloured-icon">
              <i class="icon icofont-prestashop"></i>
              <div class="info">
                <h4>Today Order</h4>
                <p><b><?= $orderCount['ordertotal']?></b></p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="customer_list.php" class="text-decoration-none">
          <div class="widget-small info coloured-icon">
            <i class="icon icofont-ui-user-group"></i>
            <div class="info">
              <h4>Customer</h4>
             <p><b><?= $orderCount['ordertotal']?></b></p>
            </div>
          </div>
        </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="brand_list.php" class="text-decoration-none">
          <div class="widget-small warning coloured-icon">
            <i class="icon icofont-badge"></i>
            <div class="info">
              <h4>Brands</h4>
              <p><b><?= $brandCount['brandtotal']?></b></p>
            </div>
          </div>
        </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="item_list.php" class="text-decoration-none">
          <div class="widget-small danger coloured-icon">
            <i class="icon icofont-box"></i>
            <div class="info">
              <h4>Items</h4>
              <p><b><?= $itemCount['itemtotal']?></b></p>
            </div>
          </div>
        </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        
      </div>


<?php
  require'backendfooter.php';
?>