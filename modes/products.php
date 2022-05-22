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

        <form method="POST" id="search-form">
            <input name="search" type="search" placeholder="Search..." autofocus required />
            <div class="flex-center">
                <div class="sorts">
                    <label for="sorts"></label>
                      <select name="sort" id="sorts" onchange="this.form.submit();">
                        <option id="RANDOM">Random</option>
                        <option value="DESC" id="DESC">Price from the highest</option>
                        <option value="ASC" id="ASC">Price from the smallest</option>
                      </select>
                      <select name="category" id="categories" onchange="this.form.submit();">
                        <option id="All">All categories</option>
                        <?php
                        $res=$connect->query("SELECT * FROM category");
                        while($ro=$res->fetch_object()) { 
                            echo "<option value='$ro->id'>$ro->categoryName</option>";}
                        ?>
                      </select>
                </div>
            </div>
          </form>

    </div>
    <?php
          if(isset($_POST['search'])){
            $keyword = $_POST['search'];
            $sorts = $_POST['sort'];
            switch($sorts){
              case "DESC":
                $result = $connect->query("SELECT * FROM products WHERE name LIKE '%$keyword%' ORDER BY price DESC");
                break;
              case "ASC":
                $result = $connect->query("SELECT * FROM products WHERE name LIKE '%$keyword%' ORDER BY price ASC");
                break;
              default:
                $result = $connect->query("SELECT * FROM products WHERE name LIKE '%$keyword%' ORDER BY RAND()");
            }
          }else{
            switch($sorts){
              case "DESC":
                $result = $connect->query("SELECT * FROM products ORDER BY price DESC");
                break;
              case "ASC":
                $result = $connect->query("SELECT * FROM products ORDER BY price ASC");
                break;
              default:
                $result = $connect->query("SELECT * FROM products ORDER BY RAND()");
            }
          }
          










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