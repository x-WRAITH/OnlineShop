<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
    $result = $connect->query("SELECT * FROM products WHERE id='{$_GET['id']}'");
    while ($row = $result->fetch_object()) {
    echo <<< html
            <div class="card" style="width: 80%; height: 80%; margin-left:100px;">
                <img src="$row->image1" alt="" />
                <img src="$row->image2" alt="" />
                <img src="$row->image3" alt="" />
                <div class="card-info">
                    <h2 style="margin-left:20px;">$row->name</h2>
                    <p style="margin-bottom: 200px; ">$row->description</p>
                </div>
    html;
    if($row->amount>=1){
        echo<<<html
                <h2>Dostępność w magazanie: <strong>$row->amount</strong></h2>
                <h2 class="price">$$row->price</h2>
                <form method="POST" style="all: none;">
                    <input type="hidden" name="hidden_name" value="$row->name" />
                    <input type="hidden" name="hidden_price" value="$row->price" />
                    <input type="hidden" name="hidden_id" value="$row->id" />
                    <input type="number" name="quantity" value="1" max="$row->amount" class="form-control" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                </form>
            </div>
        html;
    } else {
        echo<<<html
                <h2>Dostępność w magazanie: <strong>NIEDOSTĘPNY</strong></h2>
                <h2 class="price">$$row->price</h2>
                <form method="POST" style="all: none;">
                    <input type="hidden" name="hidden_name" value="$row->name" />
                    <input type="hidden" name="hidden_price" value="$row->price" />
                    <input type="hidden" name="hidden_id" value="$row->id" />
                </form>
            </div>
        html;
        }
    }

?>