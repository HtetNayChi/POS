<?php

    require('frontendheader.php');
    require 'connection.php';
    $id= $_SESSION['login_user']['id'];

    $active = 0;
    

    $sql='SELECT orders.* 
    FROM orders 
    INNER JOIN users 
    ON orders.user_id=users.id
    WHERE users.status=:v1
    AND users.id =:v2
    ORDER BY created_at DESC';



    $statement = $pdo->prepare($sql);
    $statement->bindParam(':v1',$active);
    $statement->bindParam(':v2',$id);
    $statement->execute();
    $orders=$statement->fetchAll();

   
?>

<div class="jumbotron jumbotron-fluid subtitle">
        <div class="container">
            <h1 class="text-center text-white"> Order History </h1>
        </div>
</div>
<div class=" mt-5 mx-2  text-center">
       <div class="mx-5 px-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Vouncher No.</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $i=1;
                                            foreach ($orders as $order) {
                                                $orderid = $order['id'];
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
                                                <a href="view_order_detail.php?orderid=<?= $orderid?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <?php }?>
                        
                    </tbody>
                </table>

                <div class="col-12 text-right"><a class="btn mainfullbtncolor btn-secondary float-right text-decoration-none" href="index.php"><i class="icofont-shopping-cart"></i>  Continue Shopping</a></div>
             
            </div>
        </div>   
</div>
            

</div>


<?php

require('frontendfooter.php');
?>