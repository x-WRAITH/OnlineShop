<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
if(isset($_POST['add_to_cart'])){
    if(!in_array($_POST['hid_id'], $_SESSION['cart_array'])){
		array_push($_SESSION['cart_array'], $_POST['hid_id']);
		echo 'Product added to cart';
	}
	else{
		echo 'Product already in cart';
	}

}

    $result = $connect->query("SELECT * FROM products WHERE id='{$_GET['id']}'");
    while ($row = $result->fetch_object()) {
    echo <<< html
            <div class="card" style="width: 80%; height: 80%; margin-left:100px;">
                <img src="$row->image1" alt="" />
                <img src="$row->image2" alt="" />
                <img src="$row->image3" alt="" />
                <div class="card-info">
                    <h2 style="margin-left:20px;">$row->name</h2>
                    <p style="margin-bottom: 100px; margin-left:-300px; ">$row->description</p>
                </div>
                <h3 style="margin-left:-100px; margin-top:50px;">Category: <strong>
    html;
            $res=$connect->query("SELECT * FROM category");
            while($ro=$res->fetch_object()) { 
                if($ro->id == $row->categoryID ){ echo "<option value='$ro->id' selected>$ro->categoryName</option>";}}
    if($row->amount>=1){
        echo<<<html
            </strong></h3>
                <h2 style="margin-left:-100px; margin-top:150px;">Availability in stock: <strong>$row->amount</strong></h2>
                <p></p>
                <h2 class="price">$$row->price</h2>
                <form method="POST" style="all: none;">
                    <input type="hidden" name="hid_id" value="$row->id" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />  
                </form>
            </div>
        html;
    } else {
        echo<<<html
                <h2>Dostępność w magazanie: <strong>NIEDOSTĘPNY</strong></h2>
                <h2 class="price">$$row->price</h2>
            </div>
        html;
        }
    }

