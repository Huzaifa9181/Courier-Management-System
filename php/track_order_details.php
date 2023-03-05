<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connection.php";
    $track_id = trim($_POST['search']);
    if(isset($track_id) && !empty($track_id)){
        $sql = "SELECT * FROM `orders` WHERE track_order='$track_id';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             // branch sql
             $branch_id = $row['branch'];
             $branch = "SELECT * FROM `branches` WHERE id=$branch_id;";
             $result_branch_id = mysqli_query($conn,$branch);
             $data = mysqli_fetch_assoc($result_branch_id);
             // customer sql
             $customer_id = $row['customer_id'];
             $customer = "SELECT * FROM `users` WHERE id=$customer_id;";
             $result_customer = mysqli_query($conn,$customer);
             $customer_data = mysqli_fetch_assoc($result_customer);
            
             $total = $row['shipment_cost'] + $row['supply_cost'] + $row['tax'] + $row['insurance'] + $row['returned_shipment_cost'];
    
            echo '
                <tr>
                <td>'.$customer_data['username'].'</td>
                <td>'.$row['track_order'].'</td>
                <td>'.$data['name'].' , '.$data['address'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['address'].'</td>
                <td>$'.$total.'</td>
                </tr>
            ';
        }else{
            echo '
            <tr>
            <td  class="text-center" colspan="6"><b>Data not found</b></td>
            </tr>
        '; 
        }
    }
}

?>