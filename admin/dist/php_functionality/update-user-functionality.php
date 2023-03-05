<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $role = $_POST['role'];    
    $id = $_POST['id'];
    if(isset($_POST['status']) && !empty($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    $hash = password_hash($password , PASSWORD_DEFAULT);
    $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email', `password` = '$hash', `status` = '$status', `role_id` = '$role' WHERE `users`.`id` = $id;";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/all-users-table.php");
}
?>