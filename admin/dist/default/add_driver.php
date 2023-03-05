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
            <h2 class="mt-3 mb-3 ">Add Driver</h2>
            <div class="row">
                <form action="../php_functionality/add_deiver_functionality.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Driver Name <span style="color: red;">*</span></label>
                        <input type="text" placeholder="Enter Your Branch Name" name="name" class="form-control"
                            id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Driver Email address <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Enter Your Email" aria-describedby="emailHelp required">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control" placeholder="Enter Your Passord" id="password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                    <label for="branch" class="form-label">Branch Select <span style="color: red;">*</span></label>
                        <select class="form-select select2" id="branch" name="branch" aria-label="Default select example">
                            <?php
                            include "../php_functionality/connection.php";
                            $sql = "SELECT * FROM `branches`";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0 ){
                                while($data = mysqli_fetch_assoc($result)){
                                    $branch_id = $data['id'] ;
                                    $branch_name = $data['name'];
                                    $address = $data['address'];
                                    echo'
                                        <option value="'.$branch_id.'" >'.$branch_name.' , '.$address.'</option>       
                                    ';
                                }
                            }
                            ?>
                        </select>
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
    jQuery(document).ready(function(){
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