<?php
    require 'backendheader.php';
    require 'connection.php';

    $sql ="SELECT * FROM brands ORDER By brand_name";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $brands=$statement->fetchAll();
?>

        <div class="app-title">
                        <div>
                            <h1> <i class="icofont-list"></i> Brand </h1>
                        </div>
                        <ul class="app-breadcrumb breadcrumb side">
                            <a href="brand_new.php" class="btn btn-outline-primary">
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
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i =1;
                                            foreach ($brands as $brand ) {
                                                $id = $brand['brand_id'];
                                                $name = $brand['brand_name'];
                                                $logo = $brand['logo']
                                            
                                        ?>
                                        <tr>
                                            <td> <?= $i++ ?> </td>
                                            <td> 
                                                <div class="d-flex no-block align-items-center">
                                                    <?php if($logo){ ?>
                                                    <div class="mr-3">
                                                        <img src="<?=$logo; ?>" alt="user" class="rounded-circle" width="50" height="45">
                                                    </div>
                                                <?php } ?>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium"> <?= $name; ?></h5>
                                                        <span class="text-muted font-14">
                                                            <?= substr($name,0,30). '...';?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?php echo $name ?> 
                                            </td>
                                            <td>
                                                <a href="brand_edit.php?id=<?= $id?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <form class="d-inline-block" onsubmit="return confirm('Are you sure that you want to delete?')" action="brand_delete.php" method="POST">
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