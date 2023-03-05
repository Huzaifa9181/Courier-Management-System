<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $role = $_POST['role'];
    if($role == "1"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM `admin_login` WHERE username='$username' AND password='$password' AND status='1';";
        $result = mysqli_query($conn , $sql);
    
        if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = "true";
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "Admin";
            header("Location: ../../index.php");
        }else{
            header("Location: ../default/auth-login.html?user_exsist=false");
        }
    }else if($role == "2"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE username='$username' AND role_id=2;";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if($data['status'] == 1){
            $hash_pass = $data['password'];
            $hash = password_verify($password , $hash_pass);
            if($hash == 1){
                $sql_data = "SELECT * FROM `users` WHERE username='$username' AND status='1' AND role_id='2';";
                $result_data = mysqli_query($conn , $sql_data);
                if(mysqli_num_rows($result_data) > 0){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = "true";
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = "Agent";
                    header("Location: ../../index.php");
                }else{
                    header("Location: ../default/auth-login.html?user_exsist=false");
                }
            }else{
                header("Location: ../default/auth-login.html?password=false");
            }
        }else{
            header("Location: ../default/auth-login.html?approve=false");
        }
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `drivers` WHERE name='$username';";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if($data['status'] == 1){
            $hash_pass = $data['password'];
            $hash = password_verify($password , $hash_pass);
            if($hash == 1){
                $sql_data = "SELECT * FROM `drivers` WHERE name='$username' AND status='1';";
                $result_data = mysqli_query($conn , $sql_data);
                $row = mysqli_fetch_assoc($result_data);
                if(mysqli_num_rows($result_data) > 0){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = "true";
                    $_SESSION['password'] = $password;
                    $_SESSION['driver_id'] = $row['id'];
                    $_SESSION['role'] = "Driver";
                    header("Location: ../default/check_order_driver.php");
                }else{
                    header("Location: ../default/auth-login.html?user_exsist=false");
                }
            }else{
                header("Location: ../default/auth-login.html?password=false");
            }
        }else{
            header("Location: ../default/auth-login.html?approve=false");
        }
    }
   
}

?>