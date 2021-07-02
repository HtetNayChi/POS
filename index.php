<?php 
	require 'frontendheader.php';
	require 'connection.php';

	$sql= 'SELECT * FROM categories order By rand() LIMIT 8';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$categories= $statement->fetchAll();

	$sql= 'SELECT * FROM items Where discount !="" LIMIT 8';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$discountitems= $statement->fetchAll();

	$sql= 'SELECT * FROM items Order By created_at DESC LIMIT 8';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$saleitems= $statement->fetchAll();

	$randomSubcategoryid=20;
	$sql = 'SELECT * FROM items Where subcategory_id=:value1 LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':value1', $randomSubcategoryid);
	$statement->execute();
	$randomeitems = $statement->fetchAll();


	$sql= 'SELECT * FROM brands order By rand() LIMIT 8';
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$brands= $statement->fetchAll();
 ?>


	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">
			<?php 
				foreach($categories as $category){
					$randomcategory_id=$category['id'];
					$randomcategory_name=$category['name'];
					$randomcategory_logo=$category['logo'];
				
			?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				  	<img src="<?=$randomcategory_logo ?>" class="card-img-top" alt="..." width="100px" height="150px">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"> <?= $randomcategory_name; ?> </p>
				  	</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
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

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 
		            		foreach ($saleitems as $saleitem) {
		            			$si_id=$saleitem['id'];
		            			$si_name=$saleitem['name'];
		            			$si_price=$saleitem['price'];
		            			$si_discount=$saleitem['discount'];
		            			$si_photo=$saleitem['photo'];
		            			$si_codeno=$saleitem['codeno'];
		            		
						?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $si_photo?>" class="img-fluid w-100 " width="200" height="70">
		                        <p class="text-truncate"><?= $si_name?></p>
		                        <p class="item-price">
		                        	<?php 
		                        			if($si_discount){ ?>
		                        			<strike><?= $si_price ?> Ks</strike> 
		                        			<span class="d-block"><?= $si_discount ?> Ks</span>


		                        	<?php		}else{ ?>
		                        			<span class="d-block"><?= $si_price ?> Ks</span>
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

								<a href="cart.php" class="addtocartBtn  text-decoration-none"data-id="<?= $si_id ?>" data-name="<?= $si_name?>" data-price="<?= $si_price?>" data-discount="<?=$si_discount ?>" data-photo="<?= $si_photo ?>" data-codeno="<?=$si_codeno?>">Add to Cart</a>

		                    </div>
		                </div>
		           		<?php 
		               			 }
		            	?>	
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php
		            		foreach($randomeitems as $randomeitem){
		            			$ri_id = $randomeitem['id'];
		            			$ri_name = $randomeitem['name'];
		            			$ri_price= $randomeitem['price'];
		            			$ri_discount= $randomeitem['discount'];
		            			$ri_photo= $randomeitem['photo'];
		            			$ri_codeno= $randomeitem['codeno'];
		            			?>
		    
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $ri_photo ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $ri_name ?></p>
		                        <p class="text-truncate">
		                        	<?php if($ri_discount){?>
		                        		<strike><?= $ri_price ?> Ks	</strike>
		                        	<span class="d-block"><?= $ri_discount ?> Ks </span>

		                        <?php } else {?>
		                        	<span class="d-block"><?= $ri_price ?> Ks </span>

		                        <?php } ?>
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

								<a href="cart.php" class="addtocartBtn  text-decoration-none"data-id="<?= $ri_id ?>" data-name="<?= $ri_name?>" data-price="<?= $ri_price?>" data-discount="<?=$ri_discount ?>" data-photo="<?= $ri_photo ?>" data-codeno="<?=$ri_codeno?>">Add to Cart</a>

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

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">
	    	<?php 
				foreach($brands as $brand){
					$randombrand_id=$brand['brand_id'];
					$randombrand_photo=$brand['logo'];
				
			?>
	      	<div class="slide">
	      		<a href="">
		      		<img src="<?= $randombrand_photo?>" class="img-fluid">
		      	</a>
	      	</div>
	      	<?php }?>
	      	
	      	
	     
	   	</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>
<?php 
	require 'frontendfooter.php';
 ?>
