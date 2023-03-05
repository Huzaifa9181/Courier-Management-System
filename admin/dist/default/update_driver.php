<?php
include "../php_functionality/header.php"; 
include "../php_functionality/connection.php";
if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM `drivers` WHERE id=$id;";
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
<style>
    input#fluency {
    width: 57px;
    padding: 14px;
}
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Update Driver</h2>
            <div class="row">
                <form action="../php_functionality/update_driver_functionality.php" method="post">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Driver Name <span style="color: red;">*</span></label>
                        <input type="text" placeholder="Enter Your Name" value="<?php echo $row['name']; ?>"
                            name="name" class="form-control" id="Username" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Driver Email address <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Enter Your Email" value="<?php echo $row['email']; ?>"
                            aria-describedby="emailHelp required">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control" placeholder="Enter Your Passord" id="password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label">Branch Select <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="branch" id="branch" required aria-label="Default select example">
                            <?php
                                $branch_id = $row['branch_id'];
                                $branch_sql = "SELECT * FROM `branches`";
                                $branch_result = mysqli_query($conn,$branch_sql);
                                if(mysqli_num_rows($branch_result) > 0){
                                    while($branch = mysqli_fetch_assoc($branch_result)){
                                        echo'
                                            <option value="'.$branch['id'].'">'.$branch['name'].' , '.$branch['address'].'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="checkFluency()" name="status" id="fluency" type="checkbox" role="switch">
                            <label class="form-check-label" for="btn-active" id="view_status" style="color:red; padding: 9px;">Non Active</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.select2').select2();
    });
    function checkFluency()
{
  var checkbox = document.getElementById('fluency');
  var view_checkbox = document.getElementById('view_status');
  if (checkbox.checked != true)
  {
      view_checkbox.innerHTML = 'Non Active';
      view_checkbox.style.color = "red";
      checkbox.value = 'Non-Active';
  }else{
    view_checkbox.innerHTML = 'Active';
    view_checkbox.style.color = "green";
    checkbox.value = 'Active';
  }
}
</script>
<?php 
    include "../php_functionality/footer.php"; 
?>