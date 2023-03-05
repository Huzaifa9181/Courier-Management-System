<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "connection.php";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password === $cpassword){
            $sql = "SELECT * FROM `users` WHERE email='$email' AND username='$username';";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) == 0){
                $hash = password_hash($password , PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `status`, `role_id`) VALUES ('$username', '$email', '$hash', '0', '3');";
                $result = mysqli_query($conn,$sql);
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['login'] = "true";
                $_SESSION['password'] = $password;
                $_SESSION['role'] = "User";
                header("Location: ../index.php");

                $sql = "INSERT INTO `notifications` (`title`, `email`) VALUES ( 'New User Register Message Found', '$username');";
                $result = mysqli_query($conn,$sql);
                header("Location: ../index.php");
            }else
                header("Location: ../register.html?email=exsist");
            }
        }else{
            header("Location: ../register.html?password=false");
        }        
?>