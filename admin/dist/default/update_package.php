<?php
include "../php_functionality/header.php"; 
include "../php_functionality/connection.php";
if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM `packages` WHERE id=$id;";
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
            <h2 class="mt-3 mb-3 ">Update Package</h2>
            <div class="row">
                <form action="../php_functionality/update_package_functionality.php" method="post">
                    <div class="mb-3">
                        <label for="cost" class="form-label">Package Cost <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="package_name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Package Cost <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="cost" name="cost"
                            placeholder="Enter Your Package Cost" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.select2').select2();
        jQuery('.select3').select2();
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