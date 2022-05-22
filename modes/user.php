<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
if (!isset($_SESSION["user"]) ) {
    $message = "Access denied! You don\'t have permission.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>location.replace('index.php')</script>";
    exit();
}
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
                        <input type="email" name="Email" placeholder="e.g. wojteknowak02@gmail.com" value="$row->email" required><br>
                    <label for="Password">Password</label> 
                        <input type="password" name="Password" minlength="8" maxlength="50" value="$row->password" id="myPassword" required> 
                        <input type="checkbox" id="passwordCheck" onclick="showPassowrd()"><br>  
                    <label for="Firstname">Firstname</label>
                        <input type="text" name="Firstname" placeholder="e.g. Wojtek" value="$row->firstname" required><br> 
                    <label for="Lastname">Lastname</label>
                        <input type="text" name="Lastname" placeholder="e.g. Nowak" value="$row->lastname" required><br> 
                    <label for="Phone">Phone number</label>
                        <input type="text" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{3}$" placeholder="e.g. 123-456-789" name="Phone" value="$row->phone" id="inputTel"required><br> 
                    <input type="submit" name="submit_dataChange" value="Confirm the changes">
                </fieldset>
            </form>
        </div>
        <div class="addressChange">
            <form method="POST" id="msform">
                <fieldset>
                    <h3>Address change</h3>
                    <label for="shippingAddress">Shipping Address</label>
                        <input type="text" name="shippingAddress" placeholder="e.g. Limnkowa 12" value="$row->shippingAddress" required><br>
                    <label for="shippingCity">Shipping City</label> 
                        <input type="text" name="shippingCity" placeholder="e.g. Limanowa" value="$row->shippingCity" required><br>  
                    <label for="shippingPincode">Shipping Pincode</label>
                        <input type="text" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="e.g. 12-345" name="shippingPincode" value="$row->shippingPincode" required><br>  
                    <input type="submit" name="submit_addressChange" value="Confirm the changes">
                </fieldset>
            </form>
        </div>
    </div>
    html;   
    }
    if (isset($_POST['submit_dataChange'])) {
        $result = $connect->query("SELECT * FROM users WHERE email='{$_POST['Email']}' AND id!='{$_SESSION['user']}'");
        $value = $result->num_rows;
        if ($value==0){
            $connect->query("UPDATE users SET email='{$_POST['Email']}', password='{$_POST['Password']}', firstname='{$_POST['Firstname']}', lastname='{$_POST['Lastname']}', phone='{$_POST['Phone']}' WHERE id='{$_SESSION['user']}'");
            echo "<meta http-equiv='refresh' content='0'>";
            echo '<script>alert("Success! The data has been changed!");</script>';
        }else{
            echo '<script>alert("Warning! Given email is already taken!");</script>';
        }
    }
    if(isset($_POST['submit_addressChange'])){
        $connect->query("UPDATE users SET shippingAddress='{$_POST['shippingAddress']}', shippingCity='{$_POST['shippingCity']}', shippingPincode='{$_POST['shippingPincode']}' WHERE id='{$_SESSION['user']}'");
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Success! The data has been changed!");</script>';
    }
?>