<?php
include "../php_functionality/header.php"; 
// include "connection.php";
$track_id = trim($_GET['id']);
if(isset($track_id) && !empty($track_id)){
    $sql = "SELECT * FROM `orders` WHERE track_order='$track_id';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
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
            $package_result = mysqli_query($conn , $package_sql);
            $row_package = mysqli_fetch_assoc($package_result);
            $total = $row['shipment_cost'] + $row['supply_cost'] + $row['tax'] + $row['insurance'] + $row['returned_shipment_cost'];
    }
}
?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Shipment: <?php echo $track_id ; ?></h2>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                        <img src="../assets/images/barcode.png" width="200px" alt="">
                    <p><b>From: </b><?php echo $row['address'] ; ?></p>
                    <p><b>To: </b><?php echo $row['area'] .' , ' . $data['name'] .' , ' . $data['address']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>Customer/Sender</b></h5> 
                    <p style="color: red;"><?php echo $customer_data['username']; ?></p>
                    <p><?php echo $row['address'] ; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Reciver</b></h5> 
                    <p style="color: red;">.......</p>
                    <p>...........</p>
                </div>
                <div class="col-md-3">
                    <h5><b>Status</b></h5> 
                    <p><?php echo $row['type']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Ammount to be Collected</b></h5> 
                    <p>$0.000</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>Shipment Type</b></h5> 
                    <p><?php echo $row['type']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Branch</b></h5> 
                    <p><?php echo $data['name'] .' , ' . $data['address']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Created Date</b></h5> 
                    <p><?php echo $row['time']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>Shipment Cost</b></h5> 
                    <p>$<?php echo $row['shipment_cost']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Tax & Duty</b></h5> 
                    <p>$<?php echo $row['tax']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Insurance</b></h5> 
                    <p>$<?php echo $row['insurance']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>Return Cost</b></h5> 
                    <p>$<?php echo $row['returned_shipment_cost']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>From Country</b></h5> 
                    <p>Pakistan</p>
                </div>
                <div class="col-md-3">
                    <h5><b>To Country</b></h5> 
                    <p><?php echo $row['country']; ?></p>
                </div>
                <div class="col-md-3">
                    <h5><b>From Region</b></h5> 
                    <p>...........</p>
                </div>
                <div class="col-md-3">
                    <h5><b>To Region</b></h5> 
                    <p><?php echo $data['city']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>PACKAGE ITEMS</b></h5> 
                </div>
                <div class="col-md-3">
                    <h5><b>QTY</b></h5> 
                    <p>1</p>
                </div>
                <div class="col-md-3">
                    <h5><b>TYPE</b></h5> 
                    <p><?php echo $row_package['name']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5><b>PAYMENT ITEMS</b></h5> 
                </div>
                <div class="col-md-3">
                    <h5><b>PAYMENT STATUS</b></h5> 
                    <p>1</p>
                </div>
                <div class="col-md-3">
                    <h5><b>PAYMENT DATE</b></h5> 
                    <p>-</p>
                </div>
                <div class="col-md-3">
                    <h5><b>TOTAL COST</b></h5> 
                    <p style="color: blue;"><b>$<?php echo $total; ?></b></p>
                    <p>Included tax & insurance</p>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer"></i> Print</button>
    </div>
</div>
    
<?php
include "../php_functionality/footer.php"; 
?>
