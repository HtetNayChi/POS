<?php
	require 'frontendheader.php';
	require'connection.php';
	$sid=$_GET['id'];
	$sname=$_GET['name'];

//var_dump($bid);die();



	$sql ="SELECT i.*,b.brand_name as bname,b.brand_id as bid
	FROM items i, brands b,subcategories s
    WHERE i.subcategory_id =s.sub_id
    AND i.brand_id =b.brand_id
    AND i.subcategory_id=:value1
    GROUP BY i.brand_id";

     $statement=$pdo->prepare($sql);
     $statement->bindParam(':value1',$sid);
     $statement->execute();
     $subcategories=$statement->fetchALL();





	

 //    $sql ="SELECT i.id,i.codeno, i.name, i.photo, i.price, i.discount, i.description,b.brand_id,b.brand_name as bname, s.sub_id as sid ,s.sub_name as sname
 //        FROM items i, brands b,subcategories s
 //        WHERE  i.brand_id= b.brand_id 
 //        AND i.subcategory_id=s.sub_id
 //        AND s.sub_id=:value2";

 //       // $value2=18;
 //    $statement=$pdo->prepare($sql);
 //    $statement->bindParam(':value2',$items['sid']);
 //    $statement->execute();
 //    $related=$statement->fetchALL(); 


?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Product: <?= $sname ?></h1>
  		</div>
	</div>
	
	<!-- Content -->

	<div class="container mt-5 px-2">
		<?php 
                    foreach ($subcategories as $sub ) {
                        $bid = $sub['bid'];
                        $bname = $sub['bname'];
                        
           			                                
        ?>

        <div class="bbb_viewed_title_container">
                    <a href="brand.php?id=<?=$bid?>&name=<?=$bname?>" class="text-decoration-none text-dark"><h3 class="bbb_viewed_title"> <?= $bname ?>  </h3></a>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
        </div>
       

		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php
		      				
		            		 $sql ="
		            		 		SELECT i.*,b.brand_name as bname,b.brand_id as bid
									FROM items i, brands b
    								WHERE i.brand_id =b.brand_id
    								AND b.brand_id=:value1
    								AND i.subcategory_id =:value2";

     								$statement=$pdo->prepare($sql);
     								$statement->bindParam(':value1',$bid);
     								$statement->bindParam(':value2',$sid);
     								
     								$statement->execute();
     								$branditems=$statement->fetchALL();

								foreach($branditems as $bitem){
									$i_id=$bitem['id'];
									$i_name=$bitem['name'];
									$i_photo=$bitem['photo'];
									$i_price=$bitem['price'];
									$i_discount=$bitem['discount'];
									$i_codeno=$bitem['codeno'];
				
							

		            		
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<a href="item_detail.php?id=<?=$i_id?>" class=" text-decoration-none text-dark">
		                    		
		                    		<img src="<?= $i_photo ?>" class="img-fluid ">
		                    	
		                        <p class="text-truncate"><?= $i_name ?></p>
		                        <p class="item-price">
		                        	<?php 
		                        			if($i_discount){ ?>
		                        			<strike><?= $i_price ?> Ks</strike> 
		                        			<span class="d-block"><?= $i_discount ?> Ks</span>


		                        	<?php		}else{ ?>
		                        			<span class="d-block"><?= $i_price ?> Ks</span>
		                        	<?php		}?>
		                        </p>
		                        
		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>
								


								<a href="cart.php" class="addtocartBtn  text-decoration-none"data-id="<?= $i_id ?>" data-name="<?= $i_name?>" data-price="<?= $i_price?>" data-discount="<?=$i_discount ?>" data-photo="<?= $i_photo ?>" data-codeno="<?=$i_codeno?>">Add to Cart</a>
								</a>
		                    </div>
		                </div>
		                <?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>


		<?php }
		?>
		<!-- Category -->
		
	</div>

		
	

<?php
	require 'frontendfooter.php';

?>
