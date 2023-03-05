<?php
include "../php_functionality/header.php"; 
include "../php_functionality/connection.php";
session_start();
$id = $_SESSION['driver_id'];
$sql = "SELECT * FROM `order_pickups` WHERE driver =$id AND status='Assign To Driver';";

$result = mysqli_query($conn,$sql);
?>
<style>
    .buttons-pdf{
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
                                <h4 class="mt-0 header-title">Check Orders</h4>
                                <p class="text-muted font-14 mb-3">
                                    Check All Orders Details. 
                                </p>
                                
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#S.no</th>
                                            <th>Branch</th>
                                            <th>Driver</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        
                                        if(mysqli_num_rows($result) > 0){
                                            $count =1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['id'];
                                                // branch
                                                $branch_id = $row['branch'];
                                                $branch_sql = "SELECT * FROM `branches` WHERE id=$branch_id;";
                                                $result_branch = mysqli_query($conn,$branch_sql);
                                                $data = mysqli_fetch_assoc($result_branch);
                                                // driver
                                                $driver_id = $row['driver'];
                                                $driver_sql = "SELECT * FROM `drivers` WHERE id=$driver_id;";
                                                $result_driver = mysqli_query($conn,$driver_sql);
                                                $driver = mysqli_fetch_assoc($result_driver);
                                                // order
                                                $order_id = $row['order_id'];
                                                $order_sql = "SELECT * FROM `orders` WHERE id=$order_id;";
                                                $result_order = mysqli_query($conn,$order_sql);
                                                $order = mysqli_fetch_assoc($result_order);

                                                echo'
                                                <tr>
                                                    <td>'.$count.'</td>
                                                    <td>'.$data['name'].' , '.$data['address'].'</td>
                                                    <td>'.$driver['name'].'</td>
                                                    <td>'.$order['track_order'].'</td>
                                                    <td>'.$row['status'].'</td>
                                                    <td><a href="../php_functionality/check_order_driver_functionality.php?order='.$id.'&order_id='.$row['order_id'].'" class="btn btn-success" style="font-size: 17px;"><i class="bi bi-check2"></i></a></td>
                                                </tr>
                                              ';
                                              $count++;
                                            }

                                        }else{
                                            echo'
                                            <tr>
                                                <td colspan="8" class="text-center"><h3>No Data Found</h3></td>
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
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<?php include "../php_functionality/footer.php"; 
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $id = $_GET['del_id'];
    include "../php_functionality/connection.php";
    $sql = "DELETE FROM `packages` WHERE `packages`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    echo"
    <script>
        window.location.href = 'manage_package.php';
       </script>
    ";
}

?>