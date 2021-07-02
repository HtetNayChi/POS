<?php
	require 'frontendheader.php';
	require'connection.php';
	$id=$_GET['id'];

	$sql ="SELECT i.id,i.codeno, i.name, i.photo, i.price, i.discount, i.description,b.brand_id,b.brand_name as bname, s.sub_id  as sid,s.sub_name as sname,c.name as cname
        FROM items i, brands b,subcategories s,categories c
        WHERE  i.brand_id= b.brand_id 
        AND i.subcategory_id=s.sub_id
        AND s.category_id=c.id
        AND i.id=:value1";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$id);
    $statement->execute();
    $items=$statement->fetch(PDO::FETCH_ASSOC);

    //var_dump($items['sid']);


    $sql ="SELECT i.id,i.codeno, i.name, i.photo, i.price, i.discount, i.description,b.brand_id,b.brand_name as bname, s.sub_id as sid ,s.sub_name as sname
        FROM items i, brands b,subcategories s
        WHERE  i.brand_id= b.brand_id 
        AND i.subcategory_id=s.sub_id
        AND s.sub_id=:value2";

       // $value2=18;
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value2',$items['sid']);
    $statement->execute();
    $related=$statement->fetchALL(); 


?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Code Number <?=$items['codeno'];?> </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Category </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> <?= $items['cname'] ?> </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?= $items['sname'] ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="<?= $items['photo'] ?>" class="img-fluid">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?=$items['name'];?> </h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p> <?=$items['description'];?></p>
				<br>
				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<?php 
		                        			if($items['discount']){ ?>
		                        			<strike><?= $items['price'] ?> Ks</strike> 
		                        			<span class="d-block"><?= $items['discount'] ?> Ks</span>


		                        	<?php		}else{ ?>
		                        			<span class="d-block"><?= $items['price'] ?> Ks</span>
		                        	<?php		}?>
				</p>
				<br>
				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none text-muted"> <?= $items['bname'] ?> </a> </span>
				</p>


				
				<a href="cart.php" class="addtocartBtn  text-decoration-none"data-id="<?= $items['id'] ?>" data-name="<?= $items['name'] ?> " data-price="<?= $items['price'] ?> " data-discount="<?= $items['discount'] ?> " data-photo="<?= $items['photo'] ?> " data-codeno="<?= $items['codeno'] ?> ">

					<i class="icofont-shopping-cart mr-2"></i>

					Add to Cart</a>
				
				
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>
			

				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
				<?php 
		            	foreach ($related as $relateditem) {
		            			$ri_id=$relateditem['id'];
		            			$ri_name=$relateditem['name'];
		            			$ri_price=$relateditem['price'];
		            			$ri_discount=$relateditem['discount'];
		            			$ri_photo=$relateditem['photo'];
		            			$ri_codeno=$relateditem['codeno'];
		            		
						?>

				<div class="item">
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 pad15">
				<a href="">
					<img src="<?=$ri_photo;?>" class="img-fluid w-100">
				</a>
				 <p class="text-truncate"><?= $ri_name?></p>
		            <p class="item-price">
		                <?php 
		                    if($ri_discount){ ?>
		                    <strike><?= $ri_price ?> Ks</strike> 
		                    <span class="d-block"><?= $ri_discount ?> Ks</span>
		                    <?php		}else{ ?>
		                    <span class="d-block"><?= $ri_price ?> Ks</span>
		                     <?php		}?>
		                    </p>
				</div>
			</div>
			<?php } ?>
				
			</div>
				<button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
			</div>
			

			
		</div>

		
	</div>

<?php
	require 'frontendfooter.php';

?>
