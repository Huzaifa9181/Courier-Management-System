<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $customer_id = $_POST['customer_id'];
    $track_order = 'AMB'.random_int(2555,9999999999);
    $branch = $_POST['branch'];    
    $country = "Pakistan";    
    $area = $_POST['area'];    
    $address = $_POST['address'];    
    $kilometer = $_POST['kilometer'];    
    $supply_cost = $_POST['supply_cost'];    
    $shipment_cost = $_POST['shipment_cost'];    
    $package_id = $_POST['package_id'];    
    $insurance = $_POST['insurance'];    
    $tax = $_POST['tax'];    
    $returned_shipment_cost = $_POST['returned_shipment_cost'];    
    $time = date('y-m-d');

    $sql = "INSERT INTO `orders` (`customer_id`,`track_order`, `branch`, `returned_shipment_cost`, `tax`, `insurance`, `package_id`, `shipment_cost`, `supply_cost`, `kilometer`, `address`, `area`, `type`,`country` , `time`) VALUES ( '$customer_id', '$track_order', '$branch', '$returned_shipment_cost', '$tax', '$insurance', '$package_id', '$shipment_cost', '$supply_cost', '$kilometer', '$address', '$area', 'Pickup','$country','$time');
    ";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_order.php");

    
}
?>