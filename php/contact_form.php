<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $Message = $_POST['message'];
    if(isset($name) && !empty($Message)){
        $sql = "INSERT INTO `contacts` (`name`, `email`, `subject`, `message`) VALUES ( '$name', '$email', '$subject', '$Message');";
        $result = mysqli_query($conn,$sql);
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `notifications` (`title`, `message`, `email`) VALUES ( 'New Contact Message Found', '$Message', '$email');";
        $result = mysqli_query($conn,$sql);
        header("Location: ../contact.php?feedback=send");
    }
}
?>