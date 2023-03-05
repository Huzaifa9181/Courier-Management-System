<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $id = $_POST['id'];
    $package_name = $_POST['package_name'];
    $cost = $_POST['cost'];     
    $sql = "UPDATE `packages` SET `name` = '$package_name', `cost` = '$cost' WHERE `packages`.`id` = $id;";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_package.php");
}
?>