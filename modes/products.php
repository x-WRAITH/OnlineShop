<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
error_reporting(E_ERROR | E_PARSE);
?>
<div class="products">
    <div class="titleandsearch">
        <h1>Choose the perfect product for you!</h1>
        <form id="search-form">
          <input type="hidden" name="mode" value="modes/products" />
            <input name="search" type="search" placeholder="Search..." autofocus required />
          <div class="flex-center">
            <div class="sorts">
            <select name="cat" id="cats" onchange="this.form.submit();">
              <option value="all" selected>Wszystkie</option>
              <?php
              $res=$connect->query("SELECT * FROM category");
              while($ro=$res->fetch_object())  echo "<option value='$ro->id'>$ro->categoryName</option>";
              ?>
             </select>
             <label for="sorts"></label>
              <select name="sort" id="sorts" onchange="this.form.submit();">
                <option id="RANDOM" selected>Random</option>
                <option value="DESC" id="DESC">Price from the highest</option>
                <option value="ASC" id="ASC">Price from the smallest</option>
              </select> 
            </div>
          </div>
        </form>

    </div>
    <?php


          $usesWhere = false;
          $q = "SELECT * FROM products WHERE ";
          if(!empty($_GET['search'])){
            $key = $_GET['search'];
            $q .= "name LIKE '%$key%' ";
            $usesWhere = true;
          }
          if (!empty($_GET["cat"]) && $_GET["cat"] !== "all")  {
            $q .= "categoryID = {$_GET['cat']} ";
            $usesWhere = true;
          }
          if (!$usesWhere) {
            $q .= "1=1 ";
          }

          switch ($_GET["sort"]) {
            case "Random":
              $q .= "ORDER BY RAND()";
              break;
            case "DESC":
              $q .= "ORDER BY price DESC";
              break;
            case "ASC":
              $q .= "ORDER BY price ASC";
              break;
          }


          $result = $connect->query($q);
          $cat = $_GET['cat'];

        
          










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
                  <h2 class="price">$$row->price</h2> 
                </div>
              html;
          }
        ?>

</div>