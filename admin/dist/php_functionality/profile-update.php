<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    session_start();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    if($_SESSION['role'] == "Admin"){
        $sql = "UPDATE `admin_login` SET `username` = '$username', `email` = '$email' WHERE `admin_login`.`id` = $id;";
        $result = mysqli_query($conn,$sql);   
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    }elseif($_SESSION['role'] == "Agent"){
        $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email' WHERE `users`.`id` = $id;";
        $result = mysqli_query($conn,$sql);   
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    }else{
        $sql = "UPDATE `drivers` SET `name` = '$username', `email` = '$email' WHERE `drivers`.`id` = $id;";
        $result = mysqli_query($conn,$sql);   
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    }
    header("Location: ../default/profile.php");

}
?>