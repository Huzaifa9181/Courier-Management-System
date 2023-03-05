<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $branch = $_POST['branch'];
    $driver = $_POST['driver'];
    $order_id = $_POST['order_id'];

    $sql = "INSERT INTO `order_pickups` (`branch`, `driver`, `order_id`, `status`) VALUES ('$branch', '$driver', '$order_id', 'Assign To Driver');";
    $result = mysqli_query($conn,$sql);
    $sql = "UPDATE `orders` SET `type` = 'Assign To Driver' WHERE `orders`.`id` = $order_id;";
    $result = mysqli_query($conn,$sql);
    
    header("Location: ../default/manage_order_pickup.php");

}
?>