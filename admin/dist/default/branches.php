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
                                <h4 class="mt-0 header-title">All Branches </h4>
                                <p class="text-muted font-14 mb-3">
                                    All Branches Details If you want to update delete you can do it. 
                                </p>
                                <a href="add-branch.php" class="btn btn-success mb-2"><i class="bi bi-plus-circle"></i> Add Branch</a>
                                
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#S.no</th>
                                            <th>Branch Name</th>
                                            <th>Branch Email</th>
                                            <th>Branch Status</th>
                                            <th>Branch Address</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        include "../php_functionality/connection.php";
                                        $sql = "SELECT * FROM `branches`";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                                            $count =1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id =$row['id'];
                                                if($row['status'] == 1){
                                                    $status = "Active";
                                                }else{
                                                    $status = "Non Active";
                                                }
                                                
                                                echo'
                                                <tr>
                                                    <td>'.$count.'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['email'].'</td>
                                                    <td>'.$status.'</td>
                                                    <td>'.$row['address'] .' , '. $row['country'] .'</td>
                                                    <td>'.$row['time'].'</td>
                                                    <td>
                                                        <span>
                                                        <a href="update_branch.php?edit_id='.$id.'" class="btn btn-success"><i class="bi bi-pencil"></i> Update</a>
                                                        <a href="branches.php?del_id='.$id.'" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
    </div>
</div>                                    
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<?php include "../php_functionality/footer.php"; 
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $id = $_GET['del_id'];
    include "../php_functionality/connection.php";
    $sql = "DELETE FROM `branches` WHERE `branches`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    echo"
    <script>
        window.location.href = 'branches.php';
       </script>
    ";
}

?>