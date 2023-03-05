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
                                        $sql = "SELECT * FROM `orders`";
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
                                                        <a href="update_order.php?edit_id='.$id.'" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
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