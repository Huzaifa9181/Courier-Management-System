<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $area = json_encode($_POST['areas']);
    $id = $_POST['id'];

    $sql = "UPDATE `shipment` SET `areas` = '$area' WHERE `shipment`.`id` = $id;";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/manage_shipment.php");
}
?>