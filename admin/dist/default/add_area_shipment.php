<?php
include "../php_functionality/header.php"; 
include "../php_functionality/connection.php";
if(isset($_GET['shipment_id']) && !empty($_GET['shipment_id'])){
    $id = $_GET['shipment_id'];
    $sql = "SELECT * FROM `shipment` WHERE id=$id;";
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

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: black;    
}
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <h2 class="mt-3 mb-3 ">Add Area In Shipment</h2>
            <div class="row">
                <form action="../php_functionality/add_area__functionality.php" method="post">
                    <div class="mb-3">
                        <label for="password" class="form-label">Areas <span style="color: red;">*</span></label>
                        <select class="form-select select2" name="areas[]" multiple id="country" required>
                            <option value="Orangi Town">Orangi Town</option>
                            <option value="Malir">Malir</option>
                            <option value="Nazimabad">Nazimabad</option>
                            <option value="Karsaz">Karsaz</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.select2').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
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