<?php
    require_once "DB.php";

  
    function OrderInsert($p_name, $p_quantity, $p_price, $total,$d, $bid){
        $conn = getConnection();
		$sql = "INSERT INTO  `orderlist`(`p_name`, `p_quantity`, `p_price`,`total`,`o_time`,`buyer_id`) VALUES ('{$p_name}','{$p_quantity}','{$p_price}','{$total}','{$d}','{$bid}')";
		mysqli_query($conn, $sql);
    }

   function uploadedfile($src){
 
    $conn = getConnection();
    $sql = "INSERT INTO  `jobcv`(`myfile`) VALUES ('{ $src}')";
    mysqli_query($conn, $sql);

   }

   function ViewOrder($bid){
    $conn = getConnection();
    $sql = "SELECT * FROM `orderlist` WHERE `buyer_id` = '{$bid}';";
    $result = mysqli_query($conn, $sql);

    return $result;

    }

    function ViewOrderByName($username, $bid){
        $conn = getConnection();
        $sql = "SELECT * FROM `orderlist` WHERE `p_name` LIKE '%".$username."%' AND `buyer_id` = '".$bid."';";
        $result = mysqli_query($conn, $sql);
    
        return $result;
    
        }

   function login($username, $password){
        $conn = getConnection();
        $sql = "SELECT * FROM `buyer` WHERE `username` = '".$username."' AND `password` = '".$password."';";
        $result = mysqli_query($conn, $sql);
        $row = array();

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
        return $row;
   }

//    var_dump(login("@john", "1234"));

?>