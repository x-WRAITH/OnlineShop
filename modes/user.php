<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
    $result = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
    while($row=$result->fetch_object())
    {
    echo<<<html
    <div class="userForm">
        <div class="dataChange">
            <form method="POST" id="msform">
                <fieldset>
                    <h3>Data change</h3>
                    <label for="Email">Email</label>
                        <input type="email" name="Email" value="$row->email" required><br>
                    <label for="Password">Password</label> 
                        <input type="password" name="Password" minlength="8" maxlength="50" value="$row->password" id="myPassword" required> 
                        <input type="checkbox" id="passwordCheck" onclick="showPassowrd()"><br>  
                    <label for="Firstname">Firstname</label>
                        <input type="text" name="Firstname" value="$row->firstname" required><br> 
                    <label for="Lastname">Lastname</label>
                        <input type="text" name="Lastname" value="$row->lastname" required><br> 
                    <label for="Phone">Phone number</label>
                        <input type="text" name="Phone" value="$row->phone" required><br> 
                    <input type="submit" name="submit_dataChange" value="Submit">
                </fieldset>
            </form>
        </div>
        <div class="addressChange">
            <form method="POST" id="msform">
                <fieldset>
                    <h3>Address change</h3>
                    <label for="shippingAddress">Shipping Address</label>
                        <input type="text" name="shippingAddress" value="$row->shippingAddress" required><br>
                    <label for="shippingCity">Shipping City</label> 
                        <input type="text" name="shippingCity" value="$row->shippingCity" required><br>  
                    <label for="shippingPincode">Shipping Pincode</label>
                        <input type="text" name="shippingPincode" value="$row->shippingPincode" required><br>  
                    <input type="submit" name="submit_addressChange" value="Submit">
                </fieldset>
            </form>
        </div>
    </div>
    html;   
    }
?>