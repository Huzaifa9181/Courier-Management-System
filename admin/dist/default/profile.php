<?php
include "../php_functionality/header.php"; 

?>
<style>
.buttons-pdf {
    background: #ff5b5b !important;
}

#AdminOverview {
    display: none;
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
                            <h4 class="mt-0 header-title">Account Setting</h4>
                            <p class="text-muted font-14 mb-3">
                                All Your Details Here. If you want to update you can do it.
                            </p>
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a class="nav-link card-pill" href="javascript:void(0)"
                                                data-target="MyOverview">My Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link card-pill" href="javascript:void(0)"
                                                data-target="AdminOverview">Password Change</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div id="MyOverview" class="card-tab">
                                        <!-- <h2 class="card-title"></h2> -->
                                        <div class="col-md-9">
                                            <div class="card text-bg-primary mb-3 ">
                                                <div class="card-header text-center">My Profile</div>
                                                <div class="card-body">
                                                    <form action="../php_functionality/profile-update.php" method="post">
                                                        <div class="row">
                                                            <?php
                                                            include "../php_functionality/connection.php";
                                                            $username = $_SESSION['username'];
                                                            if($_SESSION['role'] == 'Admin'){
                                                                $sql = "SELECT * FROM `admin_login` WHERE username='$username' AND status='1';";
                                                            }elseif($_SESSION['role'] == 'Agent'){
                                                                $sql = "SELECT * FROM `users` WHERE username='$username' AND status='1';";
                                                            }else{
                                                                $sql = "SELECT * FROM `drivers` WHERE name='$username' AND status='1';";
                                                            }
                                                            $result = mysqli_query($conn , $sql);
                                                            $data = mysqli_fetch_assoc($result);
                                                            ?>
                                                            <div class=" mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Email
                                                                    address <span style="color: red;">*</span></label>
                                                                <input type="email" class="form-control"
                                                                    id="exampleInputEmail1" name="email"
                                                                    value="<?php echo $data['email']; ?>">
                                                                <div id="emailHelp" class="form-text">We'll never share
                                                                    your
                                                                    email with anyone else.</div>
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="username"
                                                                    class="form-label">Username <span style="color: red;">*</span></label>
                                                                    <?php
                                                                     if($_SESSION['role'] == 'Driver'){
                                                                        echo '
                                                                        <input type="text" class="form-control" id="username"
                                                                            name="username"
                                                                            value="'. $data['name'].'">
                                                                        ';
                                                                    }else{
                                                                        echo '
                                                                        <input type="text" class="form-control" id="username"
                                                                        name="username"
                                                                        value="'.$data['username'].'">
                                                                        ';
                                                                    }
                                                                    ?>
                                                                
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Password</label>
                                                                <input type="password" class="form-control" disabled
                                                                    value="<?php echo $_SESSION['password']; ?>"
                                                                    id="exampleInputPassword1">
                                                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                            </div>

                                                            <button type="submit"
                                                                class="mx-2 btn btn-success" style="width: 22%;">Update Profile</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="AdminOverview" class="card-tab">
                                        <div class="card-body">
                                            <!-- <h2 class="card-title"></h2> -->
                                            <div class="col-md-9">
                                                <div class="card text-bg-primary mb-3 ">
                                                    <div class="card-header text-center">Password Change</div>
                                                    <div class="card-body">
                                                        <form action="../php_functionality/profile_change_password.php" method="post">
                                                            <div class=" mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Old Password <span style="color: red;">*</span></label>
                                                                <input type="password" name="old_password" class="form-control" placeholder="Old Password"
                                                                    id="exampleInputPassword1">
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">New Password <span style="color: red;">*</span></label>
                                                                <input type="password" name="new_password" class="form-control" placeholder="New Password"
                                                                    id="exampleInputPassword1">
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Confirm Password <span style="color: red;">*</span></label>
                                                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"
                                                                    id="exampleInputPassword1">
                                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                            </div>

                                                                <button type="submit"
                                                                    class="btn btn-success">Change Password</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $(".card-pill").first().addClass("active");
        $(".card-pill").click(function() {
            $(".card-pill").removeClass("active");
            $(this).addClass("active");

            var target = $(this).attr("data-target");
            // console.log(target);
            $(".card-tab").hide();
            $("#" + target).show();
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "../php_functionality/footer.php";
     
if(isset($_GET['old_password']) && !empty($_GET['old_password'])){
    if($_GET['old_password'] == "false"){
        echo"
        <script>
        Swal.fire(
            'Error!',
            'Please write a correct old password!',
            'error'
            )
            jQuery('.swal2-confirm').on('click',function(){
                window.location.href = 'profile.php';
            });
        </script>
        ";
    
    }
}
if(isset($_GET['password']) && !empty($_GET['password'])){
    if($_GET['password'] == "false"){
        echo"
        <script>
        Swal.fire(
            'Error!',
            'Please write a correct password & confirm password!',
            'error'
            )
            jQuery('.swal2-confirm').on('click',function(){
                window.location.href = 'profile.php';
            });
        </script>
        ";
    
    }
}

?>