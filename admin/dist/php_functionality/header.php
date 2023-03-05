<?php
session_start();
include "connection.php";


if(!isset($_SESSION['loggedin'])){
    header("Location: ../default/auth-login.html");
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
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled="disabled" />
    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- third party css -->
    <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled="disabled" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
     <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == "Driver"){
            echo '
            <style>
                .driver_none{
                    display:none;
                }

            </style>
            ';
        }
    ?> 
    
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
                                                src="../assets/images/users/user-2.jpg" alt="Generic placeholder image"
                                                height="32">
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
                                                src="../assets/images/users/user-5.jpg" alt="Generic placeholder image"
                                                height="32">
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
                                        <img src="../assets/images/users/user-'.$count.'.jpg" class="img-fluid rounded-circle"
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
                        <img src="../assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
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
                        <a href="../default/profile.php" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="../default/auth-lock-screen.php" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="../php_functionality/logout.php" class="dropdown-item notify-item">
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
                <a href="../../index.php" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-cms.png" alt="" height="22">
                    </span>
                </a>
                <a href="../../index.php" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-cms.png" alt="" height="22">
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

                    <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                        class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="text-transform: capitalize;"><?php echo $_SESSION['username'] ;?></a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="../default/profile.php" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>
                            
                            <!-- item-->
                            <a href="../default/auth-lock-screen.php" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="../php_functionality/logout.php" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>

                    <p class="text-muted left-user-info"><?php echo $_SESSION['role']; ?></p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="../php_functionality/logout.php">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title driver_none">Navigation</li>
                        <?php
                            if(isset($_SESSION['role']) && $_SESSION['role'] == "Driver"){
                                echo '
                                <li>
                                    <a href="#Drivers" data-bs-toggle="collapse">
                                        <i class="mdi mdi-account"></i>
                                        <span> Drivers </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Drivers">
                                        <ul class="nav-second-level">
                                            <li>
                                            <a href="../default/check_order_driver.php">Check Orders</a>
                                            </li>
                                            <li>
                                                <a href="../default/track_shipment_admin.php">Track Order</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
    
                                ';
                            }                        
                        ?>
                        <li class="driver_none">
                            <a href="../../index.php">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2 driver_none">Apps</li>

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
                                            <a href="../default/add-user.php"><i class="bi bi-plus-circle-dotted"></i> Create Agent & Customer</a>
                                        </li>
                                        <li>
                                            <a href="../default/all-users-table.php">Agent & Customer</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                                ';
                            }
                        
                        ?>
                       
                        <li class="driver_none">
                            <a href="#Drivers" data-bs-toggle="collapse">
                                <i class="mdi mdi-account"></i>
                                <span> Drivers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Drivers">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="../default/add_driver.php"><i class="bi bi-plus-circle-dotted"></i> Create Drivers</a>
                                    </li>
                                    <li>
                                        <a href="../default/all_drivers_table.php">Drivers</a>
                                    </li>
                                    <li>
                                        <a href="../default/check_order_driver2.php">Check Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="driver_none">
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-truck"></i>
                                <span> Shipments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="../default/create_shipment.php"><i class="bi bi-plus-circle-dotted"></i> Create Shipment</a>
                                    </li>
                                    <li>
                                        <a href="../default/manage_shipment.php">Manage Shipment</a>
                                    </li>
                                    <li>
                                        <a href="../default/track_shipment_admin.php">Track Shipment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="driver_none">
                            <a href="#Packages" data-bs-toggle="collapse">
                            <i class="bi bi-dropbox"></i>
                                <span> Packages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Packages">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="../default/create_package.php"><i class="bi bi-plus-circle-dotted"></i> Create Package</a>
                                    </li>
                                    <li>
                                        <a href="../default/manage_package.php">Manage Packages</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="driver_none">
                            <a href="#Orders" data-bs-toggle="collapse">
                            <i class="bi bi-box2-fill"></i>
                                <span> Orders </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Orders">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="../default/create_order.php"><i class="bi bi-plus-circle-dotted"></i> Create Orders</a>
                                    </li>
                                    <li>
                                        <a href="../default/manage_order.php">Manage Orders</a>
                                    </li>
                                    <li>
                                        <a href="../default/manage_order_pickup.php">Order Pickup</a>
                                    </li>
                                    <li>
                                        <a href="../default/manage_order_dropoff.php">Order Dropoff</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                       
                        <li class="driver_none">
                            <a href="#Branches" data-bs-toggle="collapse">
                                <i class="bi bi-buildings-fill"></i>
                                <span> Branches </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Branches">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="../default/add-branch.php"><i class="bi bi-plus-circle-dotted"></i> Create Branch</a>
                                    </li>
                                    <li>
                                        <a href="../default/branches.php">All Branches</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <?php
                            if($_SESSION['role'] == 'Admin'){
                                echo '
                                <li class="driver_none">
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