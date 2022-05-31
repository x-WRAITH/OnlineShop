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
if($_GET['mode']=='modes/admin/add')
{
    if(isset($_GET["name"])) {
        if($_GET["name"] == "products") {
            if (isset($_POST['submit'])) {
                $add= "INSERT INTO products ( name, producerID, categoryID, price, description, amount, image1, image2, image3 ) VALUES ( '{$_POST['Name']}', '{$_POST['Producer']}', '{$_POST['Category']}', '{$_POST['Price']}', '{$_POST['Description']}', '{$_POST['Amount']}', '{$_POST['Image#1']}', '{$_POST['Image#2']}', '{$_POST['Image#3']}' )";
                $connect->query($add);
                echo "<meta http-equiv='refresh' content='0'>";
            }
            echo<<<html
                <div class="form-style">
                    <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name" required><br>
                        <div class="sorts">
                        <label for="Producer">Producer</label>
                            <select name="Producer">
            html;

            $querys="SELECT * FROM producer";
            $res=$connect->query($querys);
            while($row=$res->fetch_object()) { echo "<option value='$row->id'>$row->producerName</option>"; }
            
            echo<<<html

                            </select><br>
                        <label for="Category">Category</label>
                            <select name="Category">
            html;

            $querys="SELECT * FROM category";
            $res=$connect->query($querys);
            while($row=$res->fetch_object()) { echo "<option value='$row->id'>$row->categoryName</option>"; } 

            echo<<<html
                            </select><br> 
                        </div>
                        <label for="Price">Price</label>
                            <input type="text" name="Price" required><br>
                        <label for="Description">Description</label>
                            <input type="text" name="Description" required><br>
                        <label for="Amount">Amount</label>
                            <input type="number" name="Amount"required><br>
                        <label for="Image#1">Image #1</label>
                            <input type="text" name="Image#1" ><br>
                        <label for="Image#2">Image #2</label>
                            <input type="text" name="Image#2" ><br>
                        <label for="Image#3">Image #3</label>
                            <input type="text" name="Image#3"><br>
                        <input type="submit" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            html;
            




        } else if($_GET["name"] == "category"){
            if (isset($_POST['submit'])){
                $connect->query("INSERT INTO category ( categoryName ) VALUES ( '{$_POST['Name']}' )");
                header("Location: admin.php?mode=modes/admin/categories");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;

        } else if($_GET["name"] == "producer"){
            if (isset($_POST['submit'])){
                $connect->query("INSERT INTO producer ( producerName ) VALUES ( '{$_POST['Name']}' )");
                header("Location: admin.php?mode=modes/admin/producers");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Name">Name</label>
                            <input type="text" name="Name"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;

        } else if($_GET["name"] == "users"){
            if (isset($_POST['submit'])) {
                if (isset($_POST['Type'])) { $typee=1; } else { $typee=0; }
                    $connect->query("INSERT INTO users ( type, password, firstname, lastname, email, phone, shippingAddress, shippingCity, shippingPincode ) VALUES ( '{$typee}', '{$_POST['Password']}', '{$_POST['Firstname']}', '{$_POST['Lastname']}', '{$_POST['Email']}', '{$_POST['Phone']}', '{$_POST['shippingAddress']}', '{$_POST['shippingCity']}', '{$_POST['shippingPincode']}' ) ");
                    header("Location: admin.php?mode=modes/admin/users");
            }

            echo <<<html
            <div class="form-style">
                <form method="POST" id="msform">
                    <fieldset>
                        <label for="Type">Admin:</label>
                            <input type="checkbox" id="type" name="Type"><br>
                        <label for="Email">Email</label>
                            <input type="text" name="Email" required><br>
                        <label for="Password">Password</label>
                            <input type="text" name="Password" required><br>
                        <label for="Firstname">Firstname</label>
                            <input type="text" name="Firstname" ><br>
                        <label for="Lastname">Lastname</label>
                            <input type="text" name="Lastname" ><br>
                        <label for="Phone">Phone</label>
                            <input type="text" name="Phone" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{3}$" placeholder="e.g. 123-456-789" maxlength="11"><br>
                        <label for="shippingAddress">Shipping Address</label>
                            <input type="text" name="shippingAddress" ><br>
                        <label for="shippingCity">Shipping City</label>
                            <input type="text" name="shippingCity" ><br>
                        <label for="shippingPincode">Shipping Pincode</label>
                            <input type="text" name="shippingPincode" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="e.g. 12-345" maxlength="6"><br>
                        <input type="submit" name="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
            html;

        }
    }
}

?>
