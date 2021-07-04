<?php
    require 'backendheader.php';
    require 'connection.php';

    $sql ="SELECT s.sub_id , s.sub_name,c.id,c.name FROM subcategories s, categories c
    WHERE s.category_id = c.id ORDER By s.sub_name";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $subcategories=$statement->fetchAll();

 
?>

        <div class="app-title">
                        <div>
                            <h1> <i class="icofont-list"></i> Sub-Category </h1>
                        </div>
                        <ul class="app-breadcrumb breadcrumb side">
                            <a href="subcategory_new.php" class="btn btn-outline-primary">
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
                                          <th>Category</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i =1;
                                            foreach ($subcategories as $subcategory ) {
                                                $id = $subcategory['sub_id'];
                                                $name = $subcategory['sub_name'];
                                                $c_id = $subcategory['id'];
                                                $c_name = $subcategory['name']
                                            
                                        ?>
                                        <tr>
                                            <td> <?= $i++ ?> </td>
                                            <td> 
                                                <?php echo $name ?> 
                                            </td>
                                            <td>
                                                <?php echo $c_name ?> 
                                                
                                            </td>
                                            <td>
                                                <a href="subcategory_edit.php?id=<?= $id?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <form class="d-inline-block" onsubmit="return confirm('Are you sure that you want to delete?')" action="subcategory_delete.php" method="POST">
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