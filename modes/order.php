<?php
session_start();


if(isset($_POST['submit_order'])){
    $result = $connect->query("SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart_array']) . ")");
    $index = 0;
    while ($row = $result->fetch_object()){
        $connect->query("UPDATE products SET amount=amount-'{$_SESSION['quantity_array'][$index]}' WHERE id='{$row->id}'");
        $index++;
    }
    unset($_SESSION['paymentyOrder']);
    unset($_SESSION['shoppingAdress']);
    unset($_SESSION['shippingCity']);
    unset($_SESSION['shippingPincode']);
    unset($_SESSION['deliveryOrder']);
    unset($_SESSION['cart_array']);
    echo "<script> location.href = 'index.php' </script>";

}


if (!isset($_SESSION['order'])) {
    echo "<script> location.href = 'index.php' </script>";
}
?>
    <table id="cart">
        <thead>
            <th colspan="0">Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if (!empty($_SESSION['cart_array'])) {
                //create array of initail qty which is 1
                $index = 0;
                $result = $connect->query("SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart_array']) . ")");
                while ($row = $result->fetch_object()) {
            ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->price . "$"; ?></td>
                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                        <td><?php echo $_SESSION['quantity_array'][$index]; ?></td>
                        <td><?php echo ($_SESSION['quantity_array'][$index] * $row->price) . "$"; ?></td>
                    </tr>
                <?php
                    $total += ($_SESSION['quantity_array'][$index] * $row->price);
                    $index++;
                }
            }else{
                Header("Location: index.php");
            }
            
            ?>
        </tbody>
    </table>
    <br><br><br><br><br>

        <h3>Payment: 
        <?php 
            if($_SESSION['paymentyOrder'] == "Blik"){
                echo "Blik";
            }elseif($_SESSION['paymentyOrder'] == "Ot"){
                echo "Online transfer";
            }elseif($_SESSION['paymentyOrder'] == "Cod"){
                echo "Cash on delivery";
            }
        ?>
        </h3><br>
        <h3>Delivery address:</h3>
        <h4>
        <?php 
            echo "Shopping address: ".$_SESSION['shoppingAdress']."<br>";
            echo "Shipping city: ".$_SESSION['shippingCity']."<br>";
            echo "Shipping pincode: ".$_SESSION['shippingPincode']."<br>";
        ?>
        </h4><br>
        <h3>Delivery: 
        <?php 
            if($_SESSION['deliveryOrder'] == "14"){
                echo "Inpost Delivery + 14$";
                $total+=14;
            }elseif($_SESSION['deliveryOrder'] == "18"){
                echo "DHL Delivery + 18$";
                $total+=18;
            }elseif($_SESSION['deliveryOrder'] == "20"){
                echo "DHL Delivery(Insured) + 55$";
                $total+=55;
            }
        ?>
        </h3>
    <div class="copyright">
        <h2 id="total">Total price: <?php echo $total . "$"; ?></h2>
    </div>
    <form method="POST">
        <input type="submit" name="submit_order" value="Confirm the order">
    </form>
