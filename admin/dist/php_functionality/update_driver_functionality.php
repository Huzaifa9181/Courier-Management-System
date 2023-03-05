<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $name = $_POST['name'];
    $password = $_POST['password'];    
    $email = $_POST['email'];    
    $branch_id = $_POST['branch'];    
    $status = '1';    
    $id = $_POST['id'];

    if(isset($_POST['status']) && !empty($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    $hash = password_hash($password , PASSWORD_DEFAULT);
    $sql = "UPDATE `drivers` SET `name` = '$name', `email` = '$email', `password` = '$hash', `branch_id` = '$branch_id', `status` = '$status' WHERE `id` = $id;
    ";
    $result = mysqli_query($conn,$sql);
    header("Location: ../default/all_drivers_table.php");


}
?>