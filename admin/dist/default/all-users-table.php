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
    header("Location: dist/default/check_order_driver.php");
}

?>
<style>
    .buttons-pdf{
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
                                <h4 class="mt-0 header-title">All Users Data</h4>
                                <p class="text-muted font-14 mb-3">
                                    All Users Details If you want to update delete you can do it. 
                                </p>
                                <a href="add-user.php" class="btn btn-success mb-2"><i class="bi bi-plus-circle"></i> Add User</a>
                                
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#S.no</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        include "../php_functionality/connection.php";
                                        $sql = "SELECT * FROM `users`";
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
                                                       echo "<td style='color:green;'>Active</td>";
                                                    }else{
                                                        echo "<td style='color:red;'>Non Active</td>";
                                                    }
                                                   echo '
                                                    <td>'.$role.'</td>
                                                    <td>'.$row['time'].'</td>
                                                    <td>
                                                        <span>
                                                        <a href="update-user.php?edit_id='.$id.'" class="btn btn-success"><i class="bi bi-pencil"></i> Update</a>
                                                        <a href="all-users-table.php?del_id='.$id.'" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
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

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<?php include "../php_functionality/footer.php"; 
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $id = $_GET['del_id'];
    include "../php_functionality/connection.php";
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    echo"
    <script>
        window.location.href = 'all-users-table.php';
       </script>
    ";
}

?>