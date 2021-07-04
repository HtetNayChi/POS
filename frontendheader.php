<?php
	require 'connection.php';
	session_start();

	$sql ='SELECT * FROM categories ORDER BY name';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$categories = $statement->fetchAll();

	$sql ='SELECT * FROM brands ORDER BY brand_name';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$brands = $statement->fetchAll();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

	<title> Shopules </title>

	<!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

    <!-- iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="icon/icofont/icofont.min.css">
	<!-- Boxicon CSS -->
    <link rel="stylesheet" type="text/css" href="icon/boxicons-master/css/boxicons.min.css">
    
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="frontend/css/font.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/media_query.css">
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.min.css">

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" type="text/css" href="frontend/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/owl.theme.default.css">

</head>
<body>

	<!-- Navigation-->
	<div class="container-fluid">

		<div class="row shadow-sm p-3 bg-white rounded d-flex align-items-center">
			<!-- LOGO -->
			<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 order-1">
				<span class="d-xl-none d-lg-none d-md-inline d-sm-inline d-inline  p-1 navslidemenu">
					<i class="icofont-navigation-menu"></i>
				</span>
				<img src="image/logo/logo1.png" class="img-fluid d-xl-inline d-lg-inline d-md-none d-sm-none d-none">

				<img src="imgae/logo/logo1.png" class="img-fluid d-xl-none d-lg-none d-md-inline d-sm-none d-none" style="width: 100px">

				<img src="image/logo/logo1.png" class="img-fluid d-xl-none d-lg-none d-md-none d-sm-inline d-inline pl-2" style="width: 30px">
			</div>
			
			<!-- Search Bar -->
			<div class="col-xl-6 col-lg-6 col-md-4 col-sm-2 col-2 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
				<div class="row">
					<div class="col-lg-8 col-2 ">
						<div class="has-search d-xl-block d-lg-block d-none ">
						    <div class="input-group">
				                <input class="form-control pl-4 border-right-0 border" type="search" placeholder="Search" id="">
				                <span class="input-group-append searchBtn">
				                    <div class="input-group-text bg-transparent">
				                    	<i class="icofont-search"></i>
				                    </div>
				                </span>
				            </div>
						</div>
					</div>
					<div class="col-lg-4 col-10">


						<?php 

						if(!isset($_SESSION['login_user'])){?>
						<a href="login.php" class="d-xl-block d-lg-block d-md-block d-none  text-decoration-none loginLink float-right"> Login | Sign-up </a>
						
						<?php } else {?>
						<div class="dropdown py-2 ">
                    		<a class="app-nav__item ">
                    			<i class="icofont-user-alt-3 "></i>
						   		<?= $_SESSION['login_user']['name'];?>
						  </a>  
                		</a>
		                  <ul class="dropdown-menu settings-menu ">
		                  	<?php if($_SESSION['login_user']['rname']=='Customer'){ ?>
		                    <li>
		                        <a class="dropdown-item" href="customer_detail.php?id=<?= $_SESSION['login_user']['id'];?>">
		                            <i class="icofont-ui-user"></i> &nbsp;Profile
		                        </a>
		                    </li>
		                    <li>
		                        <a class="dropdown-item" href="order_history.php">
		                           <i class="icofont-history"></i>&nbsp;
		                            Order History
		                        </a>
		                    </li>
		                <?php }?>
		                    
		                    <li>
		                        <a class="dropdown-item" href="signout.php">
		                            <i class="logoutbtn icofont-logout"></i>&nbsp;
		                            Logout
		                        </a>
		                    </li>
		                  </ul>
                		</div>
					<?php }?>
				</div>
			</div>
		</div>
			
			<!-- Shopping-cart -->
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 order-xl-3 order-lg-3 order-md-4 order-sm-4 order-4 text-right">
				<!-- Search ICON shopping cart -->

				<div class="d-xl-none d-lg-none d-md-none d-sm-inline d-inline searchiconBtn mr-2">
					<i class="icofont-search"></i>
				</div>

				<a href="cart.php" class="text-decoration-none d-xl-inline d-lg-inline d-md-inline d-sm-none d-none shoppingcartLink"> 
					<i class="icofont-shopping-cart"></i> 
					<span class="badge badge-pill badge-light badge-notify cartNotistyle cartNoti"> 1 </span>
					<span class="cartTotal"> 0 Ks </span>
				</a>

				<!-- <a href="cart.php" class="text-decoration-none d-xl-none d-lg-none d-md-none d-sm-inline-block d-inline-block shoppingcartLink"> 
					<i class="icofont-shopping-cart"></i>
					<span class="badge badge-pill badge-light badge-notify cartNotistyle cartTotal"> 1 </span>
				</a> -->

				<!-- App Download -->

				<img src="image/logo/download.jpeg" class="img-fluid d-xl-inline d-lg-inline d-md-none d-sm-none d-none" style="width: 100px">
			</div>
		</div>
	</div>
	<div id="myPage"></div>
	
	<!-- Sub Nav (MOBILE) -->
	<div class="container subNav d-xl-block d-lg-block d-none my-3">
		<div class="row align-items-center">
			<div class="col-3 align-items-center">
				<p class="d-inline pr-3"> Shop By </p>

				<div class="dropdown d-inline-block">
          			<a class="nav-link text-decoration-none text-dark font-weight-bold d-block" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          	<span class="mr-2"> Category </span>
						<i class="icofont-rounded-down pt-2"></i>

			        </a>
			        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          	
			        	<?php 
			        		foreach($categories as $category){
			        			$id= $category['id'];
			        			$name= $category['name'];
			        		
			        	 ?>
			          	<li class="dropdown-submenu">
			          		<a class="dropdown-item" href="category.php?category_id=<?=$id?>&cname=<?=$name?>" class=" text-decoration-none text-dark">
			          			<?= $name; ?>
			          			<i class="icofont-rounded-right float-right"></i>
			          		</a>
				            <ul class="dropdown-menu">
				            	<h6 class="dropdown-header">
				            		<?= $name; ?>
				            	</h6>

				              
				            	<?php
				            		$sql ='SELECT * FROM subcategories Where category_id = :value1';
				            		$statement =$pdo->prepare($sql);
				            		$statement->bindParam(':value1',$id);
				            		$statement->execute();

				            		$subcategories=$statement->fetchAll();

				            		foreach ($subcategories as $subcategory) {
				            				$sid=$subcategory['sub_id'];
				            				$sname=$subcategory['sub_name'];
				            	?>

				              	<li><a class="dropdown-item" href="subcategory.php?id=<?=$sid?>&name=<?=$sname?>" class=" text-decoration-none text-dark">
			          			<?= $sname; ?></a></li>
				              	<?php }  ?>
				            </ul>
			          	</li>
			          	<div class="dropdown-divider"></div>

			          <?php } ?>

			        </ul>
        		</div>
			</div>

			<div class="col-3">
				<a href="discount.php" class="text-decoration-none text-dark font-weight-bold"> Promotion </a>
			</div>
			<div class="col-3">
				<div class="hov-dropdown d-inline-block">
          			<a class="text-decoration-none text-dark font-weight-bold" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<span class="mr-2"> Merchants </span>
						<i class="icofont-rounded-down pt-2"></i>

          			</a>
          			<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            			<?php 
			        		foreach($brands as $brand){
			        			$bid= $brand['brand_id'];
			        			$bname= $brand['brand_name'];
			        		
			        	 ?>

            			<a class="dropdown-item" href="brand.php?id=<?=$bid?>&name=<?=$bname?>"><?= $bname ?></a>
            			<div class="dropdown-divider"></div>
            			<?php } ?>
          			</div>
        		</div>
			</div>

			<div class="col-3">
				<div class="hov-dropdown d-inline-block">
          			<a class="text-decoration-none text-dark font-weight-bold" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<span class="mr-2"> Services </span>
						<i class="icofont-rounded-down pt-2"></i>

          			</a>
          			<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            			<a class="dropdown-item" href="#">
            				Help Center
            			</a>
            			<div class="dropdown-divider"></div>
            			
            			<a class="dropdown-item" href="cart.php">
            				Order
            			</a>
            			<div class="dropdown-divider"></div>
            			
            			<a class="dropdown-item" href="#">
            				Shipping & Delivery
            			</a>
            			<div class="dropdown-divider"></div>

            			<a class="dropdown-item" href="#">
            				Payment
            			</a>
            			<div class="dropdown-divider"></div>

            			<a class="dropdown-item" href="#">
            				Returns & Refunds
            			</a>

          			</div>
        		</div>
			</div>
		</div>
	</div>

	<!-- Sub Nav (WEB) -->
	<div id="mySidebar" class="sidebar">
		<div class="row">
			<div class="col-10">
	  			<img src="image/logo/logo1.png" class="img-fluid ml-3  " style="width: 100px">
			</div>
			<div class="col-2">
				<a href="javascript:void(0)" class="closebtn text-decoration-none">
			  		<i class="icofont-close-line"></i>
			  	</a>
			</div>
		</div>
		
		<div class="mt-3">
			<p class="text-muted ml-4"> Shop By </p>
			<hr>
			<?php 
			        		foreach($categories as $category){
			        			$id= $category['id'];
			        			$name= $category['name'];
			        		
			 ?>

		  	<a data-toggle="collapse" href="#category<?= $id; ?>" role="button" aria-expanded="false" aria-controls="category">
		   		<?= $name; ?>
		   		<i class="icofont-rounded-down float-right mr-3"></i>
		  	</a>

			<div class="collapse sidebardropdown_container_category mt-3" id="category<?= $id; ?>">
			    <?php
				            		$sql ='SELECT * FROM subcategories Where category_id = :value1';
				            		$statement =$pdo->prepare($sql);
				            		$statement->bindParam(':value1',$id);
				            		$statement->execute();

				            		$subcategories=$statement->fetchAll();

				            		foreach ($subcategories as $subcategory) {
				            				$sid=$subcategory['sub_id'];
				            				$sname=$subcategory['sub_name'];
				            	?>


			    <a href="subcategory.php?id=<?=$sid?>&name=<?=$sname?>" class="py-2"> <?= $sname; ?> </a>
				<?php } ?>
			</div>

			<hr>
		<?php } ?>

		  	<a href="#"> Promotion </a>
			<hr>

		  	<a data-toggle="collapse" href="#brand" role="button" aria-expanded="false" aria-controls="brand">
		   		Merchants
		   		<i class="icofont-rounded-down float-right mr-3"></i>

		  	</a>

			<div class="collapse sidebardropdown_container_category mt-3" id="brand">
			    <?php 
			        		foreach($brands as $brand){
			        			$bid= $brand['brand_id'];
			        			$bname= $brand['brand_name'];

			      ?>

			      <a href="brand.php?id=<?=$bid?>&name=<?=$bname?>" class="py-2"><?= $bname; ?> </a>

			     <?php } ?>
			 	</div>
			        		
			<hr>

			<a data-toggle="collapse" href="#service" role="button" aria-expanded="false" aria-controls="service">
		   		Service
		   		<i class="icofont-rounded-down float-right mr-3"></i>
		  	</a>

			<div class="collapse sidebardropdown_container_category mt-3" id="service">
			    <a href="" class="py-2"> Help Center </a>
			    <a href="" class="py-2"> Order </a>
			    <a href="" class="py-2"> Shipping & Delivery </a>
			    <a href="" class="py-2"> Payment </a>
			    <a href="" class="py-2"> Returns & Refunds </a>
			</div>
			<hr>

			<a href="#"> Login | Signup</a>
			<hr>

			<a href="#"> Cart [ <span class="cartNoti"> 1 </span> ]  </a>
			<hr>

			<img src="image/logo/download2.png" class="img-fluid ml-5 pl-2 text-center" style="width: 150px">
			<hr>

			<p class="text-white ml-3"> Copyright &copy;  2019  </p>

		</div>
	  	
	</div>

	

	