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
                            <h4 class="mt-0 header-title">Manage Shipment</h4>
                            <p class="text-muted font-14 mb-3">
                                All Shipment Details If you want to update delete you can do it.
                            </p>
                            <a href="create_shipment.php" class="btn btn-success mb-2"><i class="bi bi-plus-circle"></i> Add
                                Shipment</a>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#S.no</th>
                                        <th>Country Name</th>
                                        <th>Region</th>
                                        <th>Areas</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        include "../php_functionality/connection.php";
                                        $sql = "SELECT * FROM `shipment`";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                                            $count =1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['status'] == 1){
                                                    $status = "Active";
                                                }else{
                                                    $status = "Non Active";
                                                }
                                                $area= json_decode($row['areas']);
                                                $region = json_decode($row['country_region']);
                                                $id = $row['id'];
                                                
                                                $regions = implode(' , ', $region);
                                                if(!empty($area)){
                                                    $string_area = implode(' , ', $area);
                                                }else{
                                                    $string_area = "Please Select Areas";
                                                }

                                                echo'
                                                <tr>
                                                    <td>'.$count.'</td>
                                                    <td>'.$row['country_name'].'</td>
                                                    <td>'.$regions.'</td>
                                                    <td>'.$string_area.'</td>
                                                    '; 
                                                echo'

                                                    <td>'.$status.'</td>
                                                    <td>
                                                        <span style="display:flex;">
                                                        <a href="add_area_shipment.php?shipment_id='.$id.'" class="btn btn-success" style="margin: 3px;"><i class="bi bi-pencil" ></i>Area</a>
                                                        <a href="update_shipment.php?edit_id='.$id.'" class="btn btn-success" style="margin: 3px;"> <i class="bi bi-pencil"></i> Update</a>
                                                        <a href="manage_shipment.php?del_id='.$id.'" class="btn btn-danger" style="margin: 3px;"><i class="bi bi-trash"></i>Delete</a>
                                                        </span>
                                                    </td>
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

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <?php include "../php_functionality/footer.php"; 
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $id = $_GET['del_id'];
    include "../php_functionality/connection.php";
    $sql = "DELETE FROM `shipment` WHERE `shipment`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    echo"
    <script>
        window.location.href = 'manage_shipment.php';
       </script>
    ";
}

?>