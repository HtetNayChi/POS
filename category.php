<?php
	require 'frontendheader.php';
	require'connection.php';
	$cid=$_GET['category_id'];
	$cname=$_GET['cname'];

	//var_dump($cid);die();



	$sql ="SELECT *
	FROM subcategories s, categories c
    WHERE s.category_id = c.id 
    AND c.id=:value1";

     $statement=$pdo->prepare($sql);
     $statement->bindParam(':value1',$cid);
     $statement->execute();
     $subcategories=$statement->fetchALL();

?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $cname ?> List</h1>
  		</div>
	</div>
	
	<!-- Content -->
	
	<div class="container mt-5">


		<div class="row mt-5 ">
            <div class="col">
            	<?php 
                    foreach ($subcategories as $subcategory ) {
                        $sid = $subcategory['sub_id'];
                        $sname = $subcategory['sub_name'];
                        $c_id = $subcategory['id'];
                        $c_name = $subcategory['name']
                                            
                ?>
                <div class="bbb_viewed_title_container">
                    <a href="subcategory.php?id=<?=$sid?>&name=<?=$sname?>" class="text-decoration-none text-dark"><h3 class="bbb_viewed_title"> <?= $sname ?>  </h3></a>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container mb-5">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                    	<?php
                    		$sql= 'SELECT * FROM items 
    						Where subcategory_id=:value2';

							$statement=$pdo->prepare($sql);
							$statement->bindParam(':value2',$sid);
							$statement->execute();
							$sitems= $statement->fetchAll();
							 //var_dump($sitems);
               			    
					        foreach ($sitems as $item ) {
                        	$i_id = $item['id'];
                        	$i_code = $item['codeno'];
                        	$i_name = $item['name'];
                        	$i_photo =$item['photo'];
                        	$i_price = $item['price'];
                        	$i_discount =$item['discount'];                  
                		?>
					    <div class="owl-item">
					        	<div class="item">
					            <div class="pad15">
					        		<img src="<?= $i_photo ?>" class="img-fluid" style="width: 100px; object-fit:cover ;">
					            	<p class="text-truncate"><?= $i_code ?></p>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        </div>
					    </div>

					   <?php } ?>
					</div>
                </div>
            <?php }?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <a href="subcategory.php?id=<?=$sid?>" class="text-decoration-none text-dark"><h3 class="bbb_viewed_title"> <?= $sname ?>  </h3></a>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="image/item/saisai_one.jpg" class="img-fluid">
					            	<p class="text-truncate">Multi Item Carousel</p>
					            	<p class="item-price">
					            		<strike>250,000 Ks </strike> 
					            		<span class="d-block">230,000 Ks</span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/saisai_three.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/saisai_four.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/giordano_one.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/giordano_two.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/giordano_three.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/giordano_four.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/apple_four.jpeg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/apple_four.jpeg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>


					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/apple_one.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks</span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/apple_three.jpg" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>


					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					            	<img src="image/item/apple_two.png" class="img-fluid">
					                <p class="text-truncate">Multi Item Carousel</p>
					                <p class="item-price">
					                	<strike>250,000 Ks </strike> 
					                	<span class="d-block">230,000 Ks </span>
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

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

					            </div>
					        </div>
					    </div>

					</div>
                </div>
            </div>
        </div>

	</div>

<?php
	require 'frontendfooter.php';

?>
