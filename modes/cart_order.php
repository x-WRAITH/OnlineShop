<?php
session_start();
if(isset($_POST['submit_paymentyOrder'])){
    $_SESSION['paymentyOrder'] = $_POST['Payment'];
    $_SESSION['order'] = true;
    echo "<script> location.href = 'index.php?mode=modes/order.php' </script>";
}
if(isset($_POST['submit_deliveryOrder'])){
    $_SESSION['deliveryOrder'] = $_POST['Delivery'];
    echo '
    <div class="paymentyOrder">
        <form method="POST">
            <label for="Payment">Payment</label>
                <select name="Payment">
                    <option value="Blik" seletecd>Blik</option>
                    <option value="Ot">Online transfer</option>
                    <option value="Cod">Cash on delivery</option>
                </select>
                <input type="submit" name="submit_paymentyOrder" value="Confirm the payment">
        </form>
    </div>
    ';
}
if(isset($_POST['submit_addressOrder']))
{
    $_SESSION['shoppingAdress'] = $_POST['shippingAddress'];
    $_SESSION['shippingCity'] = $_POST['shippingCity'];
    $_SESSION['shippingPincode'] = $_POST['shippingPincode'];
    echo '
        <div class="deliveryOrder">
            <form method="POST">
                <label for="Delivery">Delivery</label>
                    <select name="Delivery">
                        <option value="14" seletecd>Inpost Delivery - 14$</option>
                        <option value="18">DHL Delivery - 18$</option>
                        <option value="20">DHL Delivery(Insured) - 55$</option>
                    </select>
                    <input type="submit" name="submit_deliveryOrder" value="Confirm the delivery">
            </form>
        </div>
    ';
}
if(isset($_SESSION['user'])){
    $result = $connect->query("SELECT shippingAddress, shippingCity, shippingPincode FROM users WHERE id='{$_SESSION['user']}'");
    while($row=$result->fetch_object())
    {
    echo <<< html
        <div class="addressOrder">
            <form method="POST" id="msform">
                <fieldset>
                    <h3>Address change</h3>
                    <label for="shippingAddress">Shipping Address</label>
                        <input type="text" name="shippingAddress" placeholder="e.g. Limnkowa 12" value="$row->shippingAddress" required><br>
                    <label for="shippingCity">Shipping City</label> 
                        <input type="text" name="shippingCity" placeholder="e.g. Limanowa" value="$row->shippingCity" required><br>  
                    <label for="shippingPincode">Shipping Pincode</label>
                        <input type="text" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="e.g. 12-345" name="shippingPincode" value="$row->shippingPincode" required><br>  
                    <input type="submit" name="submit_addressOrder" value="Confirm the address">
                </fieldset>
            </form>
        </div>
    html;
    }
}else{
    echo <<< html
        <div class="addressOrder">
            <form method="POST" id="msform">
                <fieldset>
                    <h3>Address change</h3>
                    <label for="shippingAddress">Shipping Address</label>
                        <input type="text" name="shippingAddress" placeholder="e.g. Limnkowa 12" required><br>
                    <label for="shippingCity">Shipping City</label> 
                        <input type="text" name="shippingCity" placeholder="e.g. Limanowa" required><br>  
                    <label for="shippingPincode">Shipping Pincode</label>
                        <input type="text" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="e.g. 12-345" name="shippingPincode" required><br>  
                    <input type="submit" name="submit_addressOrder" value="Confirm the address">
                </fieldset>
            </form>
        </div>
    html;
}