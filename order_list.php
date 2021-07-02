<?php

    require 'backendheader.php';
    require 'connection.php';

    $active = 0;
    $todaydate= date('Y-m-d');

    if(isset($_POST['search'])){
        $startdate= $_POST['startDate'];
        $enddate=$_POST['endDate'];

        $sql='SELECT orders.* 
            FROM orders 
            INNER JOIN users 
            ON orders.user_id=users.id
            WHERE users.status=:v1
            AND orders.orderdate BETWEEN :v2 and :v3
            ORDER BY created_at DESC';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$startdate);
    $statement->bindParam(':v3',$enddate);
    $statement->execute();
    $orders=$statement->fetchAll();
    }else{

    $sql='SELECT orders.* 
    FROM orders 
    INNER JOIN users 
    ON orders.user_id=users.id
    WHERE users.status=:v1
    AND orders.orderdate =:v2
    ORDER BY created_at DESC';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$todaydate);
    $statement->execute();
    $orders=$statement->fetchAll();

    }

    
    
?>

        <div class="app-title">
                        <div>
                            <h1> <i class="icofont-list"></i> Order </h1>
                        </div>
                        <ul class="app-breadcrumb breadcrumb side">
                            <a href="brand_new.php" class="btn btn-outline-primary">
                                <i class="icofont-plus"></i>
                            </a>
                        </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Search Order History </h3>
                        <div class="tile-body">
                            <form action="order_list.php" method="POST" class="row">
                                <input type="hidden" name="search" value="search" >
                                <div class="form-group col-md-5">
                                   <label class="control-label">Start Date</label> 
                                   <input class="form-control" type="date" name="startDate">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="control-label">End Date</label> 
                                   <input class="form-control" type="date" name="endDate">
                                </div>
                                <div class="form-group col-md-2 align-self-end">
                                    <button class="btn btn-primary searchBtn btn-block" type="submit">
                                        <i class="icofont-search-2"></i>
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Vouncher No.</th>
                                          <th>Status</th>
                                          <!-- <th>Total</th> -->
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($orders as $order) {
                                                $id = $order['id'];
                                                $orderdate=$order['orderdate'];
                                                $voucherno=$order['voucherno'];
                                                $orderstatus=$order['status'];
                                            if($orderstatus ==0){
                                                $status="<span class='badge rounded-pill  bg-primary'> Pending </span>";
                                            }
                                            if($orderstatus ==1){
                                                $status="<span class='badge rounded-pill bg-dark '> Confirm </span>";
                                            }
                                            if($orderstatus ==2){
                                                $status="<span class='badge rounded-pill bg-success '> Deliver </span>";
                                            }
                                            if($orderstatus ==3){
                                                $status="<span class='badge rounded-pill bg-success'> Success </span>";
                                            }
                                            if($orderstatus ==4){
                                                $status="<span class='badge rounded-pill bg-danger'> Cancel </span>";
                                            }
                                        ?>
                                        <tr>
                                            <td> <?= $i++?> </td>
                                            <td> <?= $orderdate; ?></td>
                                            <td> <?= $voucherno; ?> </td>
                                            <!-- <td> 17000 </td> -->
                                            <td> <?= $status; ?> </td>
                                            <td>
                                                <a href="order_detail.php?id=<?= $id?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                               <form class="d-inline-block" onsubmit="return confirm('Are you sure that you want to cancel?')" action="order_status.php" method="POST">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <input type="hidden" name="status" value="4">
                                                    <button class="btn btn-outline-danger" <?php if($orderstatus>=4) echo "disabled" ?>>

                                                        <i class="icofont-ui-close"></i>
                                                        
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

<?php
    require 'backendfooter.php';
?>        