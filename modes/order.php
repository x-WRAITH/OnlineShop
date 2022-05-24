<?php
session_start();
if (isset($_SESSION['order'])) {
?>
    <table id="cart">
        <input type="submit" style="all: none;" name="save" value="Save Cart" />
        <thead>
            <th></th>
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
                if (!isset($_SESSION['quantity_array'])) {
                    $_SESSION['quantity_array'] = array_fill(0, count($_SESSION['cart_array']), 1);
                }
                $result = $connect->query("SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart_array']) . ")");
                while ($row = $result->fetch_object()) {
            ?>
                    <tr>
                        <td>
                            <a href="modes/cart.php?action=removeitem&id=<?php echo $row->id; ?>&index=<?php echo $index; ?>"><i class="fas fa-ban"></i></a>
                        </td>
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
            } else {
                ?>
                <tr>
                    <td colspan="4">No Item in Cart</td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
<?php
}
?>