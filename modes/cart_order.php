<?php
if(isset($_POST['submit_addressOrder']))
{
    echo "adres git"; 
}
if(isset($_SESSION['user'])){
    $result = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
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