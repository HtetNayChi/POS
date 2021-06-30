<?php
    require 'backendheader.php';
    require 'connection.php';
    
    $sql= 'SELECT * FROM subcategories order By sub_name';
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $subcategories= $statement->fetchAll();

    $sql= 'SELECT * FROM brands order By brand_name';
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $brands= $statement->fetchAll();
?>

 <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="item_list.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="item_add.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                 <label for="code_id" class="col-sm-2 col-form-label"> CodeNo </label>
                                 <div class="col-sm-10">
                                <input type="text" class="form-control" id="code_id" name="codeno">
                                </div>
                            </div>
                                  <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name">
                                    </div>
                                </div>

                               <div class="form-group row">
                                  <label for="price" class="col-sm-2 col-form-label"> Price </label>
                                  <div class="bs-component col-sm-10">
                                    <ul class="nav nav-tabs">
                                      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#price-tab">Unit Price</a></li>
                                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#discount-tab">Discount</a></li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade active show" id="price-tab">
                                        <input type="text" class="form-control mt-3" name="price">
                                      </div>
                                      <div class="tab-pane fade" id="discount-tab">
                                        <input type="text" class="form-control mt-3" name="discount">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  <div class="form-group row">
                                     <label for="photo_id" class="col-sm-2 col-form-label"> Description </label>
                                     <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                    </div>

                                </div>

                                 <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="brand">
                                         <option selected >Choose Brand</option>
                                        <?php 
                                                foreach($brands as $brand){
                                                    $b_id=$brand['brand_id'];
                                                    $b_name=$brand['brand_name'];
                                                
                                            ?>
                                         
                                          <option value="<?=$b_id?>"><?= $b_name?></option>
                                      <?php }?>
                                        </select>
                                    </div>
                                </div>

                                   <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Sub-Category </label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="subcategory">
                                         <option selected >Choose Sub-Category</option>
                                        <?php 
                                                foreach($subcategories as $subcategory){
                                                    $c_id=$subcategory['sub_id'];
                                                    $c_name=$subcategory['sub_name'];
                                                
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
                                            Save
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