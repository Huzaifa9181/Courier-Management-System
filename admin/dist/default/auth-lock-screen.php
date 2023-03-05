<?php
 session_start(); 
 if(isset($_SESSION['loggedin'])){
    unset($_SESSION['loggedin']);
 }elseif(!isset($_SESSION['username'])){
    header("Location: ../default/auth-login.html");
 }
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
<title>Lock Screen | CMS - Courier Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.png">

		<!-- App css -->
<link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

<link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
<link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

<!-- icons -->
<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">
                            <a href="index.html">
                                <img src="../assets/images/logo-cms.png" alt="" height="22" class="mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">CMS Admin Lock Screen</p>
                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0 mb-4">Welcome Back</h4>
                                    <img src="../assets/images/users/user-1.jpg" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                                    <p class="text-muted my-4">Enter your password to access the admin.</p>

                                </div>

                                <form action="../php_functionality/lock_screen.php" method="post">

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" value="<?php echo $_SESSION['password'];?>" name="password" required id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="mb-0 text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
      
        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>
</html>