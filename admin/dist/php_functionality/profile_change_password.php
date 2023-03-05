<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    session_start();
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_POST['id'];
    if($new_password === $confirm_password){
        if($_SESSION['role'] == "Admin"){
            $sql = "SELECT * FROM `admin_login` WHERE id='$id';";
            $result = mysqli_query($conn,$sql);   
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                if($row['password'] === $old_password){
                    $sql = "UPDATE `admin_login` SET `password` = '$new_password' WHERE `admin_login`.`id` = $id;";
                    $result =  mysqli_query($conn,$sql);
                    unset($_SESSION['password']);
                    $_SESSION['password'] = $new_password;
                    header("Location: ../default/profile.php");
                }else{
                    header("Location: ../default/profile.php?old_password=false");
                }
            }
        }elseif($_SESSION['role'] == "Agent"){
            $sql = "SELECT * FROM `users` WHERE id='$id';";
            $result = mysqli_query($conn,$sql);   
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                 $hash_pass = $row['password'];
                 $hash = password_verify($old_password , $hash_pass);
                
                if($hash == 1){
                    $last_password = password_hash($new_password , PASSWORD_DEFAULT);
                    $sql = "UPDATE `users` SET `password` = '$last_password' WHERE `users`.`id` = $id;";
                    $result =  mysqli_query($conn,$sql);
                    unset($_SESSION['password']);
                    $_SESSION['password'] = $new_password;
                    header("Location: ../default/profile.php");
                }else{
                    header("Location: ../default/profile.php?old_password=false");
                }
            };
        }else{
            $sql = "SELECT * FROM `drivers` WHERE id='$id';";
            $result = mysqli_query($conn,$sql);   
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $hash_pass = $row['password'];
                $hash = password_verify($old_password , $hash_pass);
                if($hash == 1){
                    $last_password = password_hash($new_password , PASSWORD_DEFAULT);
                    $sql = "UPDATE `drivers` SET `password` = '$last_password' WHERE `drivers`.`id` = $id;";
                    $result =  mysqli_query($conn,$sql);
                    unset($_SESSION['password']);
                    $_SESSION['password'] = $new_password;
                    header("Location: ../default/profile.php");
                }else{
                    header("Location: ../default/profile.php?old_password=false");
                }
            }; 
        };
    }else{
        header("Location: ../default/profile.php?password=false");
    };
}
?>