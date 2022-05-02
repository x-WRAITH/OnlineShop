<div class="products">
        <div class="titleandsearch">
          <h1>Choose the perfect product for you!</h1>
          <input type="text" /> 
        </div>
        <?php
          $result = $connect->query("SELECT * FROM products ORDER BY RAND()");
          while ($row = $result->fetch_object()) {
            echo <<< html
                <div class="cards">
                  <div class="card">
                    <img src="$row->image1" alt="" />
                    <div class="card-info">
                      <h2 style="">$row->name</h2>
                      <p>$row->description</p>
                    </div>
                    <h2 class="price">$$row->price</h2>
                  </div>
                </div>
              html;
          }
        ?>

</div>