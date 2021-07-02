<?php
    require 'backendheader.php';
    require 'connection.php';

    $rid= 2;
    $active = 0 ;

    $sql="SELECT users.*, roles.id as rid FROM users 
        INNER JOIN model_has_roles ON users.id = model_has_roles.user_id
        INNER JOIN roles ON model_has_roles.role_id = roles.id
        WHERE model_has_roles.role_id=:rid
        AND users.status=:v2";


    $statement = $pdo->prepare($sql);
    $statement->bindParam(':rid',$rid);
    $statement->bindParam(':v2',$active);
    $statement->execute();
    $customers=$statement->fetchAll();

    //var_dump($customers);
?>

        <div class="app-title">
                        <div>
                            <h1> <i class="icofont-list"></i> Customer </h1>
                        </div>
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
                                          <th>Contact</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i =1;
                                            foreach ($customers as $customer ) {
                                                $id = $customer['id'];
                                                $name=$customer['name'];
                                                $email=$customer['email'];
                                                $phone=$customer['phone'];
                                        ?>
                                        <tr>
                                            <td> <?= $i++ ?> </td>
                                            <td> <?= $name?> </td>
                                            <td> <?= $email?>
                                            <div>
                                            <span class="text-muted font-14">
                                                             <?= $phone?>
                                                        </span>
                                             </td>
                                         </div>
                                           
                                            <td>
                                               <a href="" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>
                                               <form class="d-inline-block" onsubmit="return confirm('Are you sure that you want to delete?')" action="customer_delete.php" method="POST">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button class="btn btn-outline-danger">

                                                        <i class="icofont-ui-close"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    <?php } ?>
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