<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<div class="products">
    <div class="titleandsearch">
        <h1>Cart&nbsp;&nbsp;&nbsp;<span class="amountItem-cart">(1)</span></h1>
    </div>

    <div class="cards">
        <div class="card">
            <?php
            $result = $connect->query("SELECT * FROM products WHERE id=2");
            while ($row = $result->fetch_object()) {
                echo <<< html
                        <img src="$row->image1" alt>
                        <div class="card-info">
                            <h2 class="price-cart">$$row->price</h2>

                            
                        </div>    
                    html;
            }
            ?>
        </div>
    </div>
    <div class="copyright">
        <h2 id="total">Total price: 1000$</h2>
    </div>
</div>
