<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE email='$email' AND role_id=3;";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
    if($data['status'] == 1){
        $hash_pass = $data['password'];
        $hash = password_verify($password , $hash_pass);
        if(mysqli_num_rows($result) > 0){
            if($hash == 1){
                $sql_data = "SELECT * FROM `users` WHERE username='$username' AND password='$password' AND status='1' AND role_id='3';";
                $result_data = mysqli_query($conn , $sql_data);
                if($result_data){
                    $data = mysqli_fetch_assoc($result_data);
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['login'] = "true";
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = "User";
                    header("Location: ../index.php");
                }
            }else{
                header("Location: ../login.php?password=false");
            }
        }else{
            header("Location: ../login.php?user_exsist=false");
        }
    }else{
        header("Location: ../login.php?user_approve=false");
        
    }
}     
?>