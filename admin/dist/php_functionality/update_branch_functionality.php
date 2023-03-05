<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $name = $_POST['name'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $address = $_POST['address'];    
    $country = $_POST['country'];    
    $id = $_POST['id'];
    if(isset($_POST['status']) && !empty($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }
    $hash = password_hash($password , PASSWORD_DEFAULT);
    $sql = "UPDATE `branches` SET `name` = '$name', `email` = '$email', `password` = '$hash', `address` = '$address', `country` = '$country', `status` = '$status' WHERE `branches`.`id` = $id;
    ";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/branches.php");
}
?>