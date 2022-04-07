<?php

require("./php/db_connect.php");
$site = null;
if ($_GET['mode'] == 'modes/admin/modification') {
    if (isset($_GET["name"])) {
        if ($_GET["name"] == "products") {
            $table = "products";
        } else 
        if ($_GET["name"] == "category") {
            $table = "category";
        } else 
        if ($_GET["name"] == "producer") {
            $table = "producer";
        } else 
        if ($_GET["name"] == "users") {
            $table = "users";
            $typee=0;
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            echo "<label>Przesłane ID: ".$_GET['id']."</label>";

            echo <<<html
                <div class="form-style">
                    <form method="GET" action="admin.php?mode=modes/admin/modyfication.php">
                        <label for="Type">Type</label>
            html;
            if($row->type==1){
                $typee=$row->type;
                echo '<input type="checkbox" id="type" name="Type" checked>';
            } else {echo '<input type="checkbox" id="type" name="Type">';}
            echo <<<html
                        <label for="Login">Login</label>
                            <input type="text" name="Login" value="$row->login"><br>
                        <label for="Password">Password</label>
                            <input type="text" name="Password" value="$row->password"><br>
                        <label for="Firstname">Firstname</label>
                            <input type="text" name="Firstname" value="$row->firstname"><br>
                        <label for="Lastname">Lastname</label>
                            <input type="text" name="Lastname" value="$row->lastname"><br>
                        <label for="Email">Email</label>
                            <input type="text" name="Email" value="$row->email"><br>
                        <label for="Phone">Phone</label>
                            <input type="number" name="Phone" value="$row->phone" maxlength="9"><br>
                        <label for="shippingAddress">Shipping Address</label>
                            <input type="text" name="shippingAddress" value="$row->shippingAddress"><br>
                        <label for="shippingCity">Shipping City</label>
                            <input type="" name="shippingCity" value="$row->shippingCity"><br>
                        <label for="shippingPincode">Shipping Pincode</label>
                            <input type="number" name="shippingPincode" value="$row->shippingPincode" maxlength="5"><br>
                        <input type="submit" name="submit" value="SEND">
                    </form>
                </div>
            html;
        }
            if (isset($_GET['submit'])) {
                if(isset($_GET['Type'])) echo $typee=1;
            
                $mod= "UPDATE $table SET type='{$typee}', login='{$_GET['Login']}', password='{$_GET['Password']}', firstname='{$_GET['Firstname']}', lastname='{$_GET['Lastname']}', email='{$_GET['Email']}', phone='{$_GET['Phone']}', shippingAddress='{$_GET['shippingAddress']}', shippingCity='{$_GET['shippingCity']}', shippingPincode='{$_GET['shippingPincode']}' WHERE id='{$_GET['id']}'";
                echo $mod;
                $connect->query($mod);
                header("Location: admin.php?mode=modes/admin/{$table}");
            }
    }
}
