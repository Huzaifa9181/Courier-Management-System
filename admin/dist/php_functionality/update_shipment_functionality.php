<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $country = $_POST['country'];
    $region =json_encode($_POST['region']);      
    $id = $_POST['id'];
    if(isset($_POST['status']) && !empty($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    $sql = "UPDATE `shipment` SET `country_name` = '$country' , `country_region` = '$region', `status` = '$status' WHERE `shipment`.`id` = $id;
    ";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_shipment.php");
}
?>