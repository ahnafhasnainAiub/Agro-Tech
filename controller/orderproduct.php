<?php 
	session_start();
    require_once "../model/productModel.php";

$p_name = $_POST['p_name'];
$p_quantity = $_POST['p_quantity'];
$p_price= $_POST['p_price'];
$total = $p_quantity * $p_price;
$t=time();
echo($t . "<br>");
$d=(date("Y-m-d",$t)); 
    
	if($p_name == null || $p_quantity == null ||  $p_price== null){
		echo "Null items";
	}
    
    else {
        OrderInsert($p_name, $p_quantity, $p_price,$total,$d, $_SESSION["bid"]);
        header('location: ../view/orderproduct.html');
        echo("Order Taken");
    }
    
     
	
?>
