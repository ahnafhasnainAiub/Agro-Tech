<?php 
	session_start();
	require "../model/productModel.php";

	if(isset($_POST["submit"])){
		if(empty($_POST["username"]) && empty($_POST["password"])){
			echo "Invalid input";
		}else{
			$row = login($_POST["username"], $_POST["password"]);
			if($row){
				$_SESSION["bid"] = $row["id"];
				// echo $row["id"];
				header("location: ../view/buyerdashboard.php");
			}
			
		}
	}


?>