<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $role = $_POST['role'];    
    $sql = "SELECT * FROM `users` WHERE email='$email';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `email`, `password`, `status`, `role_id`) VALUES ('$username', '$email', '$hash', '1', '$role');";
        $result = mysqli_query($conn,$sql);
        header("Location: ../default/all-users-table.php");
    }else{
        header("Location: ../default/add-user.php?email=exsist");   
    }
}
?>