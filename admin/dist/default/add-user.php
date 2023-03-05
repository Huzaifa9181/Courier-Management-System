<?php
include "../php_functionality/header.php"; 
if(isset($_SESSION['role']) && $_SESSION['role'] == "Agent"){
    echo"
    <script>
        window.location.href = '../../index.php';
       </script>
    ";
}
if(isset($_SESSION['role']) && $_SESSION['role'] == 'Driver'){
    echo"
    <script>
        window.location.href = 'check_order_driver.php';
       </script>
    ";
}

?>
?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Add User</h2>
            <div class="row">
                <form action="../php_functionality/add-user-functionality.php" method="post">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username <span style="color: red;">*</span></label>
                        <input type="text" placeholder="Enter Your Username" name="username" class="form-control"
                            id="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Enter Your Email" aria-describedby="emailHelp required">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control" placeholder="Enter Your Passord" id="password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Roles <span style="color: red;">*</span></label>
                        <select class="form-select" name="role" required aria-label="Default select example">
                            <option value="2">Agent</option>
                            <option value="3">Customer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if($_GET['email'] == 'exsist'){
        echo"
        <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is already exsists! ".$_SESSION['email_exsit_write']."',
            })
        jQuery('.swal2-confirm').on('click',function(){
            window.location.href = 'add-user.php';
        });
        </script>
        ";
    }
    include "../php_functionality/footer.php"; 
?>