<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $name = $_POST['name'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $branch_id = $_POST['branch'];    
    $status = '1';    
    $sql = "SELECT * FROM `drivers` WHERE email='$email';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $sql = "INSERT INTO `drivers`(`name`, `email`, `password`,`branch_id`, `status`) VALUES ('$name','$email','$hash','$branch_id','1')";
        $result = mysqli_query($conn,$sql);
        header("Location: ../default/all_drivers_table.php");
    }else{
        header("Location: ../default/add_driver.php?email=exsist");   
    }
}
?>