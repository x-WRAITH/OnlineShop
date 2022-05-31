<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
if (!isset($_SESSION["admin"])) {
    $message = "Access denied! You don\'t have permission.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>location.replace('index.php')</script>";
    exit();
}
require_once("./php/db_connect.php");
if ($_GET['mode'] == 'modes/admin/modification') {
    if (isset($_GET["name"])) {
        if ($_GET["name"] == "products") {
            $table = "products";
            $result = $connect->query("SELECT * FROM $table WHERE id='{$_GET['id']}'");
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                $connect->query("UPDATE products SET name='{$_POST['Name']}', producerID='{$_POST['Producer']}', categoryID='{$_POST['Category']}', price='{$_POST['Price']}', description='{$_POST['Description']}', amount='{$_POST['Amount']}' WHERE id='{$_GET['id']}'");
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

            $res=$connect->query("SELECT * FROM producer");
            while($ro=$res->fetch_object()) { 
                if($ro->id == $row->producerID ){ echo "<option value='$ro->id' selected>$ro->producerName</option>";
                }else echo "<option value='$ro->id'>$ro->producerName</option>";}
            
            echo <<<html

                            </select><br>
                        <label for="Category">Category</label>
                            <select name="Category">
            html;

            $res=$connect->query("SELECT * FROM category");
            while($ro=$res->fetch_object()) { 
                if($ro->id == $row->categoryID ){ echo "<option value='$ro->id' selected>$ro->categoryName</option>";
                }else echo "<option value='$ro->id'>$ro->categoryName</option>";}

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
            $result = $connect->query("SELECT * FROM $table WHERE id='{$_GET['id']}'");
            $row = $result->fetch_object();

            if (isset($_POST['submit'])){
                $connect->query("UPDATE category SET categoryName='{$_POST['Name']}' WHERE id='{$_GET['id']}'");
                header("Location: admin.php?mode=modes/admin/categories");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name" value="$row->categoryName"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;
        } else 
        if ($_GET["name"] == "producer") {
            $table = "producer";
            $result = $connect->query("SELECT * FROM $table WHERE id='{$_GET['id']}'");
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                $connect->query("UPDATE producer SET producerName='{$_POST['Name']}' WHERE id='{$_GET['id']}'");
                header("Location: admin.php?mode=modes/admin/producers");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name" value="$row->producerName"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;
        } else 
        if ($_GET["name"] == "users") {
            $table = "users";
            $typee=0;
            $result = $connect->query("SELECT * FROM $table WHERE id='{$_GET['id']}'");
            $row = $result->fetch_object();

            if (isset($_POST['submit'])) {
                if (isset($_POST['Type'])) { $typee=1; } else { $typee=0; }
                $connect->query("UPDATE $table SET type='{$typee}', password='{$_POST['Password']}', firstname='{$_POST['Firstname']}', lastname='{$_POST['Lastname']}', email='{$_POST['Email']}', phone='{$_POST['Phone']}', shippingAddress='{$_POST['shippingAddress']}', shippingCity='{$_POST['shippingCity']}', shippingPincode='{$_POST['shippingPincode']}' WHERE id='{$_GET['id']}'");
                header("Location: admin.php?mode=modes/admin/users");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Type">Admin:</label>
            html;
            if($row->type==1){
                $typee=$row->type;
                echo '<input type="checkbox" id="type" name="Type" checked><br>';
            } else {echo '<input type="checkbox" id="type" name="Type"><br>';}
            echo <<<html
                        <label for="Email">Email</label>
                            <input type="text" name="Email" value="$row->email"><br>
                        <label for="Password">Password</label>
                            <input type="text" name="Password" value="$row->password"><br>
                        <label for="Firstname">Firstname</label>
                            <input type="text" name="Firstname" value="$row->firstname"><br>
                        <label for="Lastname">Lastname</label>
                            <input type="text" name="Lastname" value="$row->lastname"><br>
                        <label for="Phone">Phone</label>
                            <input type="text" name="Phone" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{3}$" placeholder="e.g. 123-456-789" value="$row->phone" maxlength="11"><br>
                        <label for="shippingAddress">Shipping Address</label>
                            <input type="text" name="shippingAddress" value="$row->shippingAddress"><br>
                        <label for="shippingCity">Shipping City</label>
                            <input type="text" name="shippingCity" value="$row->shippingCity"><br>
                        <label for="shippingPincode">Shipping Pincode</label>
                            <input type="text" name="shippingPincode" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="e.g. 12-345" value="$row->shippingPincode" maxlength="6"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;
        }
    }
}

                        