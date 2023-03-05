<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $package_name = $_POST['package_name'];
    $cost = $_POST['cost'];     
    $sql = "INSERT INTO `packages` ( `name`, `cost`) VALUES ('$package_name', '$cost');";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_package.php");
}
?>