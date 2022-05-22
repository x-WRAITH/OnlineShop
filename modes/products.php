<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<div class="products">
    <div class="titleandsearch">
        <h1>Choose the perfect product for you!</h1>

        <form method="GET">
            <input name="search" type="search" placeholder="Search..." autofocus required />
            <div class="flex-center">
                <div class="sorts">
                    <label for="sorts"></label>
                    <select name="sort" id="sorts">
                        <option value="RAND" selected>Random</option>
                        <option value="DESC">Price from the highest</option>
                        <option value="ASC">Price from the smallest</option>
                    </select>
                </div>
            </div>
          </form>

    </div>
    <?php
          if(isset($_GET['search'])){
            $keyword = $_GET['search'];
              $result = $connect->query("SELECT * FROM products WHERE name LIKE '%$keyword%'");
          }else{$result = $connect->query("SELECT * FROM products ORDER BY RAND()");}
          
          //jak te sorwanie ogarnac










          while ($row = $result->fetch_object()) {
            $out = strlen($row->description) > 50 ? substr($row->description, 0, 50) . "... <u><a href='index.php?mode=modes/product&id={$row->id}'>see more..</a></u>" : $row->description;
            echo <<< html
              <div class="cards">
                <div class="card">
                  <img src="$row->image1" alt="" />
                  <div class="card-info">
                    <h2 style=""><a href='index.php?mode=modes/product&id={$row->id}'>$row->name</a></h2>
                    <p>$out</p>
                  </div>
<<<<<<< HEAD
                  <h2 class="price">$$row->price</h2> 
=======
                  <form method="POST" style="all: none;">
                    <input type="hidden" name="hidden_name" value="$row->name" />
                    <input type="hidden" name="hidden_price" value="$row->price" />
                    <input type="hidden" name="hidden_id" value="$row->id" />
                    <h2 class="price">$$row->price</h2>
                    <input type="text" name="quantity" value="1" class="form-control" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                  </form>
>>>>>>> aaef8fa7d98f4d01c3e582957432df4c39156bd2
                </div>
              html;
          }
        ?>

</div>