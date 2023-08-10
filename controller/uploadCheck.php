<?php
    session_start();
    require_once "../model/DB.php";

    if(isset($_POST['upload']))
 {
  $file = addslashes(file_get_contents($_FILES["myfile"]["tmp_name"]));

    $conn = getConnection();
    $sql = "INSERT INTO  `jobcv`(`myfile`) VALUES ('{ $file}')";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
        echo '<script type="text"/javascript"> alert("File is uploaded") </script>';
    }else{
        echo  '<script type="text"/javascript"> alert("File is not uploaded") </script>';
    }


 }

    

?> 