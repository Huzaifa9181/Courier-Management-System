<?php
    include "connection.php";
    $id = $_GET['order'];
    $order_id = $_GET['order_id'];
    $sql = "UPDATE `order_pickups` SET `status` = 'Drop' WHERE `order_pickups`.`id` = $id;";
    $result = mysqli_query($conn,$sql);

    $sql = "UPDATE `orders` SET `type` = 'Drop' WHERE `orders`.`id` = $order_id;";
    $result = mysqli_query($conn,$sql);

    header("Location: ../default/check_order_driver.php");
?>