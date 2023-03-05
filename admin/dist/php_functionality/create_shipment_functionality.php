<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $country = $_POST['country'];
    $region = json_encode($_POST['region']);    
    $status = '1';    
    $sql = "INSERT INTO `shipment` (`country_name`, `country_region`, `status`) VALUES ('$country', '$region', '1');
    ";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_shipment.php");
}else{
    // header("Location: ../default/add_driver.php?email=exsist");   
}
?>