<?php
if (!isset($_SESSION["admin"])) {
    $message = "Access denied! You don\'t have permission.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>location.replace('index.php')</script>";
    exit();
}
require("./php/db_connect.php");
if ($_GET['mode'] == 'modes/admin/modification') {
    if (isset($_GET["name"])) {
        if ($_GET["name"] == "products") {
            $table = "products";
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                $mod= "UPDATE products SET name='{$_POST['Name']}', producerID='{$_POST['Producer']}', categoryID='{$_POST['Category']}', price='{$_POST['Price']}', description='{$_POST['Description']}', amount='{$_POST['Amount']}' WHERE id='{$_GET['id']}'";
                $connect->query($mod);
                header("Location: admin.php?mode=modes/admin/products");
            }

            echo <<<html
                <div class="form-style">
                    <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name" value="$row->name"><br>
                        <div class="sorts">
                        <label for="Producer">Producer</label>
                            <select name="Producer">
            html;

            $querys="SELECT * FROM producer";
            $res=$connect->query($querys);
            while($row=$res->fetch_object()) { echo "<option value='$row->id'>$row->producerName</option>"; }
            
            echo <<<html

                            </select><br>
                        <label for="Category">Category</label>
                            <select name="Category">
            html;

            $querys="SELECT * FROM category";
            $res=$connect->query($querys);
            while($row=$res->fetch_object()) { echo "<option value='$row->id'>$row->categoryName</option>";}
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            echo <<<html
                            </select><br>
                        </div>
                        <label for="Price">Price</label>
                            <input type="text" name="Price" value="$row->price"><br>
                        <label for="Description">Description</label>
                            <textarea name="Description" style="resize: vertical; max-height: 300px;">$row->description</textarea><br>
                        <label for="Amount">Amount</label>
                            <input type="number" name="Amount" value="$row->amount" maxlength="9"><br>
                        <input type="submit" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            html;
        } else 
        if ($_GET["name"] == "category") {
            $table = "category";
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                $mod= "UPDATE category SET categoryName='{$_POST['Name']}' WHERE id='{$_GET['id']}'";
                $connect->query($mod);
                header("Location: admin.php?mode=modes/admin/categories");
            }

            echo <<<html
                <div class="form-style">
                    <form method="POST">
                        <label for="Name">Name</label>
                            <input type="text" name="Name" value="$row->categoryName"><br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            html;
        } else 
        if ($_GET["name"] == "producer") {
            $table = "producer";
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                $mod= "UPDATE producer SET producerName='{$_POST['Name']}' WHERE id='{$_GET['id']}'";
                $connect->query($mod);
                header("Location: admin.php?mode=modes/admin/producers");
            }

            echo <<<html
                <div class="form-style">
                    <form method="POST">
                        <label for="Name">Name</label>
                            <input type="text" name="Name" value="$row->producerName"><br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            html;
        } else 
        if ($_GET["name"] == "users") {
            $table = "users";
            $typee=0;
            $query = "SELECT * FROM $table WHERE id='{$_GET['id']}'";
            $result = $connect->query($query);
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                if (isset($_POST['Type'])) { $typee=1; } else { $typee=0; }
                $mod= "UPDATE $table SET type='{$typee}', login='{$_POST['Login']}', password='{$_POST['Password']}', firstname='{$_POST['Firstname']}', lastname='{$_POST['Lastname']}', email='{$_POST['Email']}', phone='{$_POST['Phone']}', shippingAddress='{$_POST['shippingAddress']}', shippingCity='{$_POST['shippingCity']}', shippingPincode='{$_POST['shippingPincode']}' WHERE id='{$_GET['id']}'";
                $connect->query($mod);
                header("Location: admin.php?mode=modes/admin/users");
            }

            echo <<<html
                <div class="form-style">
                    <form method="POST">
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
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            html;
        }
    }
}

                        