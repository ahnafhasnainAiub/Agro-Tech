<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Product List</h1>
   <table border="1" style="margin: 0 auto;">
    <thead>
        <tr>
            <th>p_name </th>
            <th>p_quantity </th>
            <th>p_price </th>
            <th>total </th>
        </tr>
        <tr>
            <th>Search Product</th>
            <th colspan="3"><input type="text" placeholder="enter product name to search" onkeyup="showHint(this.value)"></th>
        </tr>
    </thead>
    <tbody id="product_list">
        <?php 
            require "../model/productModel.php";
            $result = ViewOrder($_SESSION['bid']);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['p_quantity']; ?></td>
                    <td><?php echo $row['p_price']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                </tr>
                <?php }
            }
        ?>
        
    </tbody>
   </table>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("product_list").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("product_list").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "../controller/orderList.php?pname=" + str+"&bid=<?php echo $_SESSION['bid']; ?>");
  xmlhttp.send();
  }
}
</script>
</body>
</html>