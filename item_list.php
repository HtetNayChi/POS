<?php
    require 'backendheader.php';
    require 'connection.php';
    $sql ="SELECT i.id,i.codeno, i.name, i.photo, i.price, i.discount, i.description,b.brand_id,b.brand_name, s.sub_id ,s.sub_name FROM items i, brands b,subcategories s
    WHERE  i.brand_id= b.brand_id 
    AND i.subcategory_id=s.sub_id
     ORDER By s.sub_name";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $items=$statement->fetchAll();
?>

        <div class="app-title">
                        <div>
                            <h1> <i class="icofont-list"></i> Item </h1>
                        </div>
                        <ul class="app-breadcrumb breadcrumb side">
                            <a href="item_new.php" class="btn btn-outline-primary">
                                <i class="icofont-plus"></i>
                            </a>
                        </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Brand</th>
                                          <th>Price</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            $i =1;
                                            foreach ($items as $item ) {
                                                $id = $item['id'];
                                                $codeno = $item['codeno'];
                                                $name = $item['name'];
                                                $photo = $item['photo'];
                                                $price = $item['price'];
                                                $discount = $item['discount'];
                                                $description = $item['description'];

                                                $b_id = $item['brand_id'];
                                                $b_name = $item['brand_name'];
                                                $s_id = $item['sub_id'];
                                                $s_name = $item['sub_name']
                                            
                                            ?>
                                            <td> <?= $i++ ?> </td>
                                            <td> 
                                                <div class="d-flex no-block align-items-center">
                                                    <?php if($photo){ ?>
                                                    <div class="mr-3">
                                                        <img src="<?=$photo; ?>" alt="user" class="rounded-circle" width="50" height="45">
                                                    </div>
                                                <?php } ?>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium"> <?= $codeno; ?></h5>
                                                        <span class="text-muted font-14">
                                                            <?= substr($name,0,30). '...';?>
                                                        </span>
                                                    </div>
                                                </div>   
                                            </td>
                                            <td> 
                                                <?php echo $b_name ?>
                                            </td>
                                            <td>
                                                <p class="item-price">

                                                <?php
                                                if ($discount) {
                                        
                                    
                                                ?>
                                                
                                                <span class="d-block"> <?= $discount ?>Ks</span>
                                                <strike><?= $price ?>Ks</strike> 

                                                <?php }
                                                else{ 
                                                ?>
                                                <span class="d-block"><?= $price ?>Ks</span>
                                                <?php } ?>
                                                </p>

                                            </td>
                                          <td>
                                                <a href="item_edit.php?id=<?= $id?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <form class="d-inline-block" onsubmit="return confirm('Are you sure that you want to delete?')" action="item_delete.php" method="POST">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button class="btn btn-outline-danger">

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