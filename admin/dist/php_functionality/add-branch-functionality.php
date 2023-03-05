<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $name = $_POST['name'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $address = $_POST['address'];    
    $country = $_POST['country'];    
    $status = $_POST['status'];    
    $sql = "SELECT * FROM `branches` WHERE email='$email';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $sql = "INSERT INTO `branches`(`name`, `email`, `password`, `address`, `country`,  `status`) VALUES ('$name','$email','$hash','$address','$country','1')";
        $result = mysqli_query($conn,$sql);
        header("Location: ../default/branches.php");
    }else{
        header("Location: ../default/add-branch.php?email=exsist");   
    }
}
?>