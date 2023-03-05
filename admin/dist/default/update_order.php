<?php
include "../php_functionality/header.php"; 
include "../php_functionality/connection.php";
if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM `orders` WHERE id=$id;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_SESSION['role']) && $_SESSION['role'] == 'Driver'){
    echo"
    <script>
        window.location.href = 'check_order_driver.php';
       </script>
    ";
}

?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Update Order</h2>
            <div class="row">
            <form action="../php_functionality/update_order_functionality.php" method="post">
                    <div class="mb-3">
                        <label for="cost" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" disabled value="<?php echo $row['customer_id']; ?>">
                    </div>
                    <h4>Branch Details</h4>
                    <div class="mb-3">
                        <label for="Branch" class="form-label">Branch <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="branch" id="Branch"  aria-label="Default select example" required>
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
                        <label for="Country" class="form-label">Country</label>
                        <input type="text" value="Pakistan" name="country" class="form-control" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="Area" class="form-label">Area <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="area" id="Area"  aria-label="Default select example" required>
                            <option selected disabled>--Select Area--</option>
                           <?php
                            include "../php_functionality/connection.php";
                                $sql = "SELECT * FROM `shipment` WHERE status=1;";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        $area = json_decode($data['areas']);
                                        $town = array_unique($area);
                                         foreach($town as $key => $val){
                                            echo '<option value="'.$val.'">'.$val.'</option> ';
                                         }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address <span style="color: red;">*</span></label>
                        <input type="text" name="address" class="form-control" required value="<?php echo $row['address']; ?>">
                    </div>
                    <h4>Mission Cost</h4>
                    <span style="display: flex;" >
                        <div class="col-md-6">
                            <label for="address" class="form-label">Custom Pickup Cost <span style="color: red;">*</span></label>
                            <input type="number" name="kilometer" id="kilometer" value="<?php echo $row['kilometer']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Custom Supply Cost <span style="color: red;">*</span></label>
                            <input type="number"name="supply_cost" id="supply_cost" value="<?php echo $row['supply_cost']; ?>" class="form-control" required>
                        </div>
                    </span>
                    <h4>Package Details</h4>

                    <div class="mb-3">
                        <label for="cost" class="form-label">Package <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="package_id"  aria-label="Default select example" required>
                            <option selected disabled>--Select Package--</option>
                            <?php
                            include "../php_functionality/connection.php";
                                $sql = "SELECT * FROM `packages`;";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                    echo'
                                        <option value="'.$data['id'].'">'.$data['name'].' , $'.$data['cost'].'</option>            
                                    ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <h4>Default Costs</h4>
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <span style="display: flex;" >
                        <div class="col-md-6">
                            <label for="address" class="form-label">Default Shipment Cost <span style="color: red;">*</span></label>
                            <input type="number"name="shipment_cost" id="shipment_cost" value="<?php echo $row['shipment_cost']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-6 mx-2">
                            <label for="address" class="form-label">Default Tax</label>
                            <input type="number"name="tax" id="supply_cost" value="<?php echo $row['tax']; ?>" class="form-control">
                        </div>
                    </span>
                    <span style="display: flex;" class="mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="insurance" class="form-label">Default Insurance</label>
                            <input type="number"name="insurance" id="insurance" value="<?php echo $row['insurance']; ?>" class="form-control">
                        </div>
                        <div class="col-md-6 mx-2">
                            <label for="returned_shipment_cost" class="form-label">Default Returned Shipment Cost</label>
                            <input type="number"name="returned_shipment_cost" value="<?php echo $row['returned_shipment_cost']; ?>" id="returned_shipment_cost" class="form-control" >
                        </div>
                    </span>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
jQuery(document).ready(function() {
    jQuery('.select2').select2();
    $("#kilometer").keyup(function(){
        var kilo = $("#kilometer").val();
        $('#supply_cost').val(kilo*100);
    });
});
</script>
<?php
include "../php_functionality/footer.php"; 
?>

<?php 
    if($_GET['email'] == 'exsist'){
        echo"
        <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is already exsists!',
            })
        jQuery('.swal2-confirm').on('click',function(){
            window.location.href = 'create_order.php';
        });
        
        </script>
        ";
    }
    
?>