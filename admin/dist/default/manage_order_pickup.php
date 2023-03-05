<?php
include "../php_functionality/header.php"; 
if(isset($_SESSION['role']) && $_SESSION['role'] == 'Driver'){
    echo"
    <script>
        window.location.href = 'check_order_driver.php';
       </script>
    ";
}

?>
<style>
.buttons-pdf {
    background: #ff5b5b !important;
}
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Assign to Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../php_functionality/order_pickup_functionality.php" method="POST">


                    <div class="mb-3">
                        <label for="Branch" class="form-label">Branch <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="branch" id="Branch"
                            aria-label="Default select example" required>
                            <option selected disabled>--Select Branch--</option>
                            <?php
                            include "../php_functionality/connection.php";
                                $sql = "SELECT * FROM `branches` WHERE status=1;";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo'
                                            <option value="'.$data['id'].'">'.$data['name'].' , '.$data['address'].'</option>            
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Driver" class="form-label">Driver <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="driver" id="Driver"
                            aria-label="Default select example" required>
                            <option selected disabled>--Select Driver--</option>
                            <?php
                            include "../php_functionality/connection.php";
                                $sql = "SELECT * FROM `drivers` WHERE status=1;";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo'
                                            <option value="'.$data['id'].'">'.$data['name'].'</option>            
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="order_id" id="order_id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Mission</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal close -->
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Manage Orders</h4>
                            <p class="text-muted font-14 mb-3">
                                All Ordres Details If you want to update delete you can do it.
                            </p>
                            <a href="create_order.php" class="btn btn-success mb-2"><i class="bi bi-plus-circle"></i>
                                Add Order</a>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>

                                        <th>#S.no</th>
                                        <th>Customer</th>
                                        <th>Track Order</th>
                                        <th>Branch</th>
                                        <th>Package</th>
                                        <th>Address</th>
                                        <th>Area</th>
                                        <th>Type</th>
                                        <th>Country</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        include "../php_functionality/connection.php";
                                        $sql = "SELECT * FROM `orders` WHERE type='Pickup';";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                                            $count =1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['id'];
                                                // branch sql
                                                $branch_id = $row['branch'];
                                                $branch = "SELECT * FROM `branches` WHERE id=$branch_id;";
                                                $result_branch_id = mysqli_query($conn,$branch);
                                                $data = mysqli_fetch_assoc($result_branch_id);
                                                // customer sql
                                                $customer_id = $row['customer_id'];
                                                $customer = "SELECT * FROM `users` WHERE id=$customer_id;";
                                                $result_customer = mysqli_query($conn,$customer);
                                                $customer_data = mysqli_fetch_assoc($result_customer);
                                                // package sql
                                                $package_id = $row['package_id'];
                                                $package_sql = "SELECT * FROM `packages` WHERE id=$package_id;";
                                                $package_result = mysqli_query($conn,$package_sql);
                                                $package_data = mysqli_fetch_assoc($package_result);
                                                $total = $row['shipment_cost'] + $row['supply_cost'] + $row['tax'] + $row['insurance'] + $row['returned_shipment_cost'];
                                                echo'
                                                <tr>
                                                    
                                                    <td>'.$count.'</td>
                                                    <td>'.$customer_data['username'].'</td>
                                                    <td>'.$row['track_order'].'</td>
                                                    <td>'.$data['name'].' , '.$data['address'].'</td>
                                                    <td>'.$package_data['name'].', $'.$package_data['cost'].'</td>
                                                    
                                                    <td>'.$row['address'].'</td>
                                                    <td>'.$row['area'].'</td>
                                                    <td>'.$row['type'].'</td>
                                                    <td>'.$row['country'].'</td>
                                                    <td>'.$total.'</td>
                                                    <td>
                                                        <span style="display:flex;">
                                                        <button class="btn btn-info mission_btn" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-truck"></i></button>
                                                        <a href="update_order.php?edit_id='.$id.'" class="btn btn-success mx-1"><i class="bi bi-pencil"></i></a>
                                                        <a href="manage_order.php?del_id='.$id.'" class="btn btn-danger mx-1"><i class="bi bi-trash"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                              ';
                                              $count++;
                                            }

                                        }else{
                                            echo'
                                            <tr>
                                                <td colspan="11" class="text-center"><h3>No Data Found</h3></td>
                                            </tr>
                                            ';
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script>
    $(".mission_btn").on("click", function() {
        $("#order_id").val(($(this).data('id')));
    })
    </script>


    <?php include "../php_functionality/footer.php"; 
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $id = $_GET['del_id'];
    include "../php_functionality/connection.php";
    $sql = "DELETE FROM `orders` WHERE `orders`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    echo"
    <script>
        window.location.href = 'manage_order.php';
       </script>
    ";
}

?>