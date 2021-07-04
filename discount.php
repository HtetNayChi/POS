<?php 
require 'frontendheader.php';
	
	require 'connection.php';

	$sql= 'SELECT * FROM items Where discount !="" ';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$discountitems= $statement->fetchAll();
	
 ?>


<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Promotion List</h1>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php
		            		foreach ($discountitems as $discountitem) {
		            			$di_id = $discountitem['id'];
		            			$di_name=$discountitem['name'];
		            			$di_price = $discountitem['price'];
		            			$di_discount = $discountitem['discount'];
		            			$di_photo=$discountitem['photo'];
		            			$di_codeno=$discountitem['codeno'];

		            		
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<a href="item_detail.php?id=<?=$di_id?>" class=" text-decoration-none text-dark">
		                    		
		                    		<img src="<?= $di_photo ?>" class="img-fluid ">
		                    	
		                        <p class="text-truncate"><?= $di_name ?></p>
		                        <p class="item-price">
		                        	<strike><?= $di_price ?> KS </strike> 
		                        	<span class="d-block"><?= $di_discount ?> KS</span>
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
								


								<a href="cart.php" class="addtocartBtn  text-decoration-none"data-id="<?= $di_id ?>" data-name="<?= $di_name?>" data-price="<?= $di_price?>" data-discount="<?=$di_discount ?>" data-photo="<?= $di_photo ?>" data-codeno="<?=$di_codeno?>">Add to Cart</a>
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

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>
<?php 

	require 'frontendfooter.php';
 ?>
