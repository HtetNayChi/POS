<?php
	require('frontendheader.php');
    require 'connection.php';
    $id= $_SESSION['login_user']['id'];
    $orderid=$_GET['orderid'];

     $sql= 'SELECT *
            FROM orders
            WHERE orders.id=:v1';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':v1',$orderid);
            $statement->execute();
            $order = $statement-> fetch(PDO::FETCH_ASSOC);

    $sql='SELECT * FROM item_order
			INNER JOIN items ON item_order.item_id=items.id
			WHERE item_order.order_id=:v2';

			$statement = $pdo->prepare($sql);
			$statement->bindParam(':v2',$orderid);
			$statement->execute();
			$orderdetails = $statement-> fetchALL();

			$orderstatus= $order['status'];
?>
	
		<div class="app-title mx-3">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>

      <div class="row mx-3">
	 <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: 01/01/2016</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Shopules Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: <?= $_SESSION['login_user']['email']?>/address>
                </div>
                <div class="col-4">To
                  <address>	
                  			<strong><?= $_SESSION['login_user']['name']?></strong><br>
                  			Address :<?= $_SESSION['login_user']['address']?><br>
                  			Phone: <?= $_SESSION['login_user']['phone']?><br>
                  			Email: <?= $_SESSION['login_user']['email']?>
                </address>
                </div>
                <div class="col-4">
                    <b>Invoice #<?=$order['voucherno'];?></b><br><br>
                    <b>Order Date:</b> <?=$order['orderdate'];?><br>
                    <b>Total:</b> <?=$order['total'];?><br>
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                   <tbody>
                        <?php
                            foreach ($orderdetails as $orderdetail) {

                                $qty= $orderdetail['qty'];
                                $item_codeno = $orderdetail['codeno'];
                                $item_name = $orderdetail['name'];
                                $item_price = $orderdetail['price'];
                                $item_discount = $orderdetail['discount'];
                                
                                if($item_discount){
                                    $price = $item_discount ;
                                }else{
                                    $price= $item_price;
                                }
                                $subtotal = $qty * $price;

                                ?>
                                <tr>
                                    <td><?= $qty; ?></td>
                                    <td><?= $item_name; ?></td>
                                    <td><?= $item_codeno; ?></td>
                                    <td><?= $price; ?></td>
                                    <td><?= $subtotal; ?></td>

                                </tr>

                                

                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr >
                        	<td colspan="4" >
                        		<h3 class="text-right mt-2">Total: &nbsp;</h3></td>
							<td class="text-left">
								<h3 class="text-left mt-2"> <?=$order['total'];?> </h3>
							</td>
						</tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn mainfullbtncolor btn-secondary float-right text-decoration-none" href="order_history.php"><i class="fa fa-print"></i> Back</a></div>
              </div>
            </section>
          </div>
        </div>
</div>
<?php

require('frontendfooter.php');
?>