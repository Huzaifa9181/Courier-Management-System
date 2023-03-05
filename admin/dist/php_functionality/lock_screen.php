<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    include "connection.php";
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    if($_SESSION['role'] == "Admin"){
        $sql = "SELECT * FROM `admin_login` WHERE username='$username' AND password='$password';";
        $result = mysqli_query($conn , $sql);
    
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $_SESSION['username'];
            $_SESSION['loggedin'] = "true";
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "Admin";
            header("Location: ../../index.php");
        }else{
            
        }
    }else{
        $sql = "SELECT * FROM `users` WHERE username='$username' AND status='1' AND role_id=2;";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        
        $hash_pass = $data['password'];
        $hash = password_verify($password , $hash_pass);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $_SESSION['username'];
            $_SESSION['loggedin'] = "true";
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "Agent";
            header("Location: ../../index.php");
        }else{
            
        }
    }
}

?>