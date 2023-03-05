<?php
session_start();
include "dist/php_functionality/connection.php";
if(!isset($_SESSION['loggedin'])){
    header("Location: dist/default/auth-login.html");
}

if(isset($_SESSION['role']) && $_SESSION['role'] == 'Driver'){
    header("Location: dist/default/check_order_driver.php");
}

if(isset($_SESSION['role']) && $_SESSION['role'] == 'User'){
    header("Location: dist/default/auth-login.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | CMS - Courier Management System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Huzaifa Ahmed" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="dist/assets/images/favicon.png">
    <!-- App css -->
    <link href="dist/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="dist/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="dist/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="dist/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled="disabled" />
    <!-- icons -->
    <link href="dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "gradient", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." id="top-search">
                                <button class="btn input-group-text" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found 22 results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-home me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-aperture me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle"
                                                src="dist/assets/images/users/user-2.jpg"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle"
                                                src="dist/assets/images/users/user-5.jpg"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..."
                                aria-label="Recipient's username">
                        </form>
                    </div>
                </li>
                <li class="nav-item mt-3"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>
                <?php
                if($_SESSION['role'] == 'Admin'){
                    $noti_sql = "SELECT * FROM `notifications` ORDER BY id DESC LIMIT 4 ";
                    $noti_result = mysqli_query($conn,$noti_sql);
                    $noti_count = mysqli_num_rows($noti_result);
                    echo '
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge bg-danger rounded-circle noti-icon-badge">'.$noti_count.'</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg">
    
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-end">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>
    
                            <div class="noti-scroll" data-simplebar>';
                    
                            if(mysqli_num_rows($noti_result) > 0){
                                $count =1;
                                while($row = mysqli_fetch_assoc($noti_result)){
                                    echo '
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="dist/assets/images/users/user-'.$count.'.jpg" class="img-fluid rounded-circle"
                                            alt="" />
                                    </div>
                                    <p class="notify-details">'.$row['email'].'</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, '.$row['title'].'</small>
                                    </p>
                                </a>
                                    ';
                                    $count++;
                                }
                            }
                            
                            echo'
                            </div>
                        </div>
                    </li>';
                }
            
            ?>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="dist/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            <?php echo $_SESSION['username'] ;?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="dist/default/profile.php" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="dist/default/auth-lock-screen.php" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="dist/php_functionality/logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="dist/assets/images/favicon.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="dist/assets/images/logo-cms.png" alt="" height="22">
                    </span>
                </a>
                <a href="index.php" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="dist/assets/images/favicon.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="dist/assets/images/logo-cms.png" class="mt-2" alt="logo" height="22">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Dashboard</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">

                    <img src="dist/assets/images/users/user-1.jpg" alt="user-img"
                        title="<?php echo $_SESSION['username'] ;?>" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="text-transform: capitalize;"><?php echo $_SESSION['username'] ;?></a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="dist/default/profile.php" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="dist/default/auth-lock-screen.php" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="dist/php_functionality/logout.php" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>

                    <p class="text-muted left-user-info"><?php echo $_SESSION['role'];?></p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="dist/php_functionality/logout.php">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="index.php">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Apps</li>

                        <?php
                            if($_SESSION['role'] == 'Admin'){
                                echo '
                                <li>
                                    <a href="#Users" data-bs-toggle="collapse">
                                        <i class="mdi mdi-account"></i>
                                        <span> Users </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Users">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="dist/default/add-user.php"><i class="bi bi-plus-circle-dotted"></i> Create Agent & Customer</a>
                                            </li>
                                            <li>
                                                <a href="dist/default/all-users-table.php">Agent & Customer</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                ';
                            }
                        
                        ?>

                        <li>
                            <a href="#Drivers" data-bs-toggle="collapse">
                                <i class="mdi mdi-account"></i>
                                <span> Drivers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Drivers">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="dist/default/add_driver.php"><i class="bi bi-plus-circle-dotted"></i>
                                            Create Drivers</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/all_drivers_table.php">Drivers</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/check_order_driver2.php">Check Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-truck"></i>
                                <span> Shipments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="dist/default/create_shipment.php"><i
                                                class="bi bi-plus-circle-dotted"></i> Create Shipment</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/manage_shipment.php">Manage Shipment</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/track_shipment_admin.php">Track Shipment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#Packages" data-bs-toggle="collapse">
                                <i class="bi bi-dropbox"></i>
                                <span> Packages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Packages">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="dist/default/create_package.php"><i
                                                class="bi bi-plus-circle-dotted"></i> Create Package</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/manage_package.php">Manage Packages</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#Orders" data-bs-toggle="collapse">
                                <i class="bi bi-box2-fill"></i>
                                <span> Orders </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Orders">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="dist/default/create_order.php"><i class="bi bi-plus-circle-dotted"></i>
                                            Create Orders</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/manage_order.php">Manage Orders</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/manage_order_pickup.php">Order Pickup</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/manage_order_dropoff.php">Order Dropoff</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#Branches" data-bs-toggle="collapse">
                                <i class="bi bi-buildings-fill"></i>
                                <span> Branches </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Branches">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="dist/default/add-branch.php"><i class="bi bi-plus-circle-dotted"></i>
                                            Create Branch</a>
                                    </li>
                                    <li>
                                        <a href="dist/default/branches.php">All Branches</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <?php
                            if($_SESSION['role'] == 'Admin'){
                                echo '
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-cog"></i>
                                        <span> General Settings </span>
                                    </a>
                                </li>
                                ';
                            }
                        
                        ?>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="dist/default/add-branch.php" class="dropdown-item">Create
                                                Branch</a>
                                            <a href="dist/default/branches.php" class="dropdown-item">All Branches</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Total Branches</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <a href="dist/default/add-branch.php"><i class="bi bi-plus-circle-dotted"
                                                    style="font-size: 37px;"></i></a>
                                        </div>

                                        <div class="widget-detail-1 text-end">
                                            <?php
                                            $sql = "SELECT * FROM `branches`";
                                            $result = mysqli_query($conn,$sql);
                                            $br = mysqli_num_rows($result);
                                            ?>
                                            <h2 class="fw-normal pt-2 mb-1"> <?php echo $br; ?> </h2>
                                            <p class="text-muted mb-1">Total Branches</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="dist/default/create_shipment.php" class="dropdown-item">Create
                                                Shipment</a>
                                            <a href="dist/default/manage_shipment.php" class="dropdown-item">All
                                                Shipments</a>
                                            <a href="dist/default/track_shipment_admin.php" class="dropdown-item">Track
                                                Shipment</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Total Shipments</h4>
                                    <?php
                                        $date = date('y-m-d');
                                        $sql = "SELECT * FROM `shipment`;";
                                        $result = mysqli_query($conn,$sql);
                                        $shipment_count = mysqli_num_rows($result);
                                    ?>
                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span class="badge rounded-pill float-start mt-2"><a
                                                    href="dist/default/create_shipment.php"><i
                                                        class="bi bi-plus-circle-dotted"
                                                        style="color: green; font-size:37px;"></i></a></span>
                                            <h2 class="fw-normal mb-1"> <?php echo $shipment_count; ?> </h2>
                                            <p class="text-muted mb-3">Total Shipments</p>
                                        </div>
                                        <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo $shipment_count; ?>%;">
                                                <span class="visually-hidden"><?php echo $shipment_count; ?>%
                                                    Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="dist/default/manage_order.php" class="dropdown-item">Create
                                                Orders</a>
                                            <!-- item-->
                                            <a href="dist/default/create_order.php" class="dropdown-item">All Orders</a>
                                            <!-- item-->
                                            <a href="dist/default/manage_order_pickup.php" class="dropdown-item">Orders
                                                Pickup</a>
                                            <!-- item-->
                                            <a href="dist/default/manage_order_dropoff.php" class="dropdown-item">Orders
                                                Dropoff</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Total Orders</h4>
                                    <?php
                                        $order_sql = "SELECT * FROM `orders`;";
                                        $order_result = mysqli_query($conn,$order_sql);
                                        $order_count = mysqli_num_rows($order_result);
                                    ?>
                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <a href="dist/default/add-branch.php" style="color: #dda849;"><i
                                                    class="bi bi-plus-circle-dotted" style="font-size: 37px;"></i></a>
                                        </div>
                                        <div class="widget-detail-1 text-end">
                                            <h2 class="fw-normal pt-2 mb-1"> <?php echo $order_count; ?> </h2>
                                            <p class="text-muted mb-1">Total Orders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Daily Sales</h4>
                                    <?php
                                        $date = date('y-m-d');
                                        $sql = "SELECT * FROM `orders` WHERE time='$date';";
                                        $result = mysqli_query($conn,$sql);
                                        $count = mysqli_num_rows($result);
                                    ?>
                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span
                                                class="badge bg-pink rounded-pill float-start mt-3"><?php echo $count; ?>%
                                                <i class="mdi mdi-trending-up"></i> </span>
                                            <?php 
                                            echo'<h2 class="fw-normal mb-1">'. mysqli_num_rows($result) .'</h2>';
                                            ?>

                                            <p class="text-muted mb-3">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-alt-pink progress-sm">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo mysqli_num_rows($result); ?>%;">
                                                <span class="visually-hidden"><?php echo mysqli_num_rows($result); ?>%
                                                    Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <?php 
                            $admin_sql = "SELECT * FROM `admin_login` LIMIT 4;";
                            $admin_result = mysqli_query($conn,$admin_sql);
                            $count =1;
                            if(mysqli_num_rows($admin_result) > 0){
                                while($row = mysqli_fetch_assoc($admin_result)){
                                    echo ' 
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body widget-user">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-lg me-3">
                                                        <img src="dist/assets/images/users/user-'.$count.'.jpg"
                                                            class="img-fluid rounded-circle" alt="user">
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="mt-0 mb-1" style="text-transform: capitalize;">'. $row['username'] .'</h5>
                                                        <p class="text-muted mb-2 font-13 text-truncate">'. $row['email'] .'</p>
                                                        <small class="text-warning"><b>Admin</b></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    ';
                                    $count++;
                                }
                            }
                        ?>

                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Inbox</h4>
                                    <div class="inbox-widget">
                                            <?php
                                                $noti_sql = "SELECT * FROM `notifications` ORDER BY id DESC LIMIT 4 ";
                                                $noti_result = mysqli_query($conn,$noti_sql);
                                                if(mysqli_num_rows($noti_result) > 0){
                                                    $count= 1;
                                                    while($row = mysqli_fetch_assoc($noti_result)){
                                                        echo '
                                                        <!-- item-->
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img
                                                            src="dist/assets/images/users/user-'.$count.'.jpg" class="rounded-circle" alt=""></div>
                                                            <h5 class="inbox-item-author mt-0 mb-1">'.$row['email'].'</h5>
                                                            <p class="inbox-item-text">Hey! '.$row['title'].'</p>
                                                            <p class="inbox-item-date">'.$row['time'].'</p>
                                                    </div>
                                                        ';
                                                        $count++;
                                                    }
                                                }
                                                
                                            ?>
                                           
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="dist/default/all-users-table.php" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Latest Users</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#S.no</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Role</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        $sql = "SELECT * FROM `users` ORDER BY id DESC LIMIT 4;";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                                            $count =1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id =$row['id'];
                                                
                                                if($row['role_id'] == 2){
                                                    $role = "Agent";
                                                }else{
                                                    $role = "Customer";
                                                }
                                                echo'
                                                <tr>
                                                    <td>'.$count.'</td>
                                                    <td>'.$row['username'].'</td>
                                                    <td>'.$row['email'].'</td>';
                                                    if($row['status'] == 1){
                                                        echo '<td style="color:green;">Active</td>';
                                                    }else{
                                                        echo '<td style="color:red;">Non Active</td>';
                                                    }
                                                    echo'
                                                    <td>'.$role.'</td>
                                                    <td>'.$row['time'].'</td>
                                                </tr>
                                              ';
                                              $count++;
                                            }

                                        }else{
                                            echo'
                                            <tr>
                                                <td colspan="6" class="text-center"><h3>No Data Found</h3></td>
                                            </tr>
                                            ';
                                        }
                                        ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> &copy; CMS theme by <a href="">Huzaifa Ahmed</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div data-simplebar class="h-100">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>

            <!-- Tab panes -->
            <div class="tab-content pt-0">

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, Layout, etc.
                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                                id="light-mode-check" checked />
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                        <!-- Width -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check"
                                checked />
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="boxed"
                                id="boxed-check" />
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>

                        <!-- Menu positions -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="fixed"
                                id="fixed-check" checked />
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"
                                id="scrollable-check" />
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <!-- Left Sidebar-->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light"
                                id="light-check" />
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark"
                                id="dark-check" checked />
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand"
                                id="brand-check" />
                            <label class="form-check-label" for="brand-check">Brand</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient"
                                id="gradient-check" />
                            <label class="form-check-label" for="gradient-check">Gradient</label>
                        </div>

                        <!-- size -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                                id="default-size-check" checked />
                            <label class="form-check-label" for="default-size-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"
                                id="condensed-check" />
                            <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                    size)</small></label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                                id="compact-check" />
                            <label class="form-check-label" for="compact-check">Compact <small>(Small
                                    size)</small></label>
                        </div>

                        <!-- User info -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed"
                                id="sidebaruser-check" />
                            <label class="form-check-label" for="sidebaruser-check">Enable</label>
                        </div>


                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="dark"
                                id="darktopbar-check" checked />
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="light"
                                id="lighttopbar-check" />
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="dist/assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="dist/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="dist/assets/libs/morris.js06/morris.min.js"></script>
    <script src="dist/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboar init js-->
    <script src="dist/assets/js/pages/dashboard.init.js"></script>

    <!-- App js-->
    <script src="dist/assets/js/app.min.js"></script>
    <script>
    $(document).ready(function() {

        function toggleFullscreen(elem) {
            elem = elem || document.documentElement;
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document
                .webkitFullscreenElement && !document.msFullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }
        if (('#btnFullscreen').length > 0) {
            document.getElementById('btnFullscreen').addEventListener('click', function() {
                toggleFullscreen();
            });
        }
    })
    </script>

</body>

</html>