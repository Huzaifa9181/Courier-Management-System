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
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Add Package</h2>
            <div class="row">
            <form action="../php_functionality/add_package_functionality.php" method="post">
                    <div class="mb-3">
                        <label for="cost" class="form-label">Package Cost <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="package_name"  aria-label="Default select example" required>
                            <option selected disabled>--Select Package--</option>
                            <option value="Bronze">Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Platinium">Platinium</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Package Cost <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="cost" name="cost"
                            placeholder="Enter Your Package Cost" required>
                    </div>
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
            window.location.href = 'add_driver.php';
        });
        
        </script>
        ";
    }
    
?>