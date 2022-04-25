<?php
require("./php/db_connect.php");
if($_GET['mode']=='modes/admin/add')
{
    if(isset($_GET["name"])) {
        if($_GET["name"] == "products") {
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
            
            if (isset($_POST['submit'])) {
                $add= "INSERT INTO products ( name, producerID, categoryID, price, description, amount, image1, image2, image3 ) VALUES ( '{$_POST['Name']}', '{$_POST['Producer']}', '{$_POST['Category']}', '{$_POST['Price']}', '{$_POST['Description']}', '{$_POST['Amount']}', '{$_POST['Image#1']}', '{$_POST['Image#2']}', '{$_POST['Image#3']}' )";
                $connect->query($add);
                header("Location: ../");
            }




        } else if($_GET["name"] == "category"){

        } else if($_GET["name"] == "producer"){

        } else if($_GET["name"] == "users"){

        }
    }
}

?>
