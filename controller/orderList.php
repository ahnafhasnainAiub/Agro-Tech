
        <?php 
            require "../model/productModel.php";
            $result = ViewOrderByName($_GET['pname'], $_GET['bid']);

            // echo $result;

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