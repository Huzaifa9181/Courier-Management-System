<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $order_id = $_POST['order_id'];
    $branch = $_POST['branch'];       
    $area = $_POST['area'];    
    $address = $_POST['address'];    
    $kilometer = $_POST['kilometer'];    
    $supply_cost = $_POST['supply_cost'];    
    $shipment_cost = $_POST['shipment_cost'];    
    $package_id = $_POST['package_id'];    
    $insurance = $_POST['insurance'];    
    $tax = $_POST['tax'];    
    $returned_shipment_cost = $_POST['returned_shipment_cost'];    
    
    $sql = "UPDATE `orders` SET `branch` = '$branch', `returned_shipment_cost` = '$returned_shipment_cost', `tax` = '$tax', `insurance` = '$insurance', `package_id` = '$package_id', `shipment_cost` = '$shipment_cost', `supply_cost` = '$supply_cost', `kilometer` = '$kilometer', `address` = '$address', `area` = '$area' WHERE `orders`.`id` = $order_id;";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_order.php");  
}
?>