<?php
    require 'backendheader.php';
    require 'connection.php';

    $id=$_GET['id'];
    $sql ="SELECT * FROM subcategories Where sub_id=:id";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $subcategory=$statement->fetch(PDO::FETCH_ASSOC);

    $sql ="SELECT * FROM categories Where id=:c_id";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':c_id',$subcategory['category_id']);
    $statement->execute();
    $s_categories=$statement->fetchAll();

    $sql= 'SELECT * FROM categories order By name';
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $categories= $statement->fetchAll();

    

    //var_dump($category);die();
?>

 <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> SubCategory Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="category_list.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategory_update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$subcategory['sub_id']?>">
                                <input type="hidden" name="category_id" value="<?=$subcategory['category_id']?>">
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$subcategory['sub_name']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="category">
                                        <?php 
                                                    foreach ($s_categories as $s_category ) {
                                                        $cid = $s_category['id'];
                                                        $cname = $s_category['name'];
                                            
                                                       ?> 
                                        <option selected value="<?=$cid?>"><?= $cname;}?></option>
                                          <?php 
                                                foreach($categories as $category){
                                                    $c_id=$category['id'];
                                                    $c_name=$category['name'];
                                                
                                            ?>
                                        
                                          <option value="<?=$c_id?>"><?= $c_name?></option>
                                      <?php }?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Update
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


<?php
    require 'backendfooter.php';
?>