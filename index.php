<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="shortcut icon" href="include/image/logo64x64.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	
	<title>AroShop - Sklep ziolowy</title>

</head>
<body>
    <main>
        <section class="shop">
          <div class="dashboard">
            <div id="shopinformation">
                <img alt="logo" src="images/Aro-logo-whitemode.png">
                <p>Sklep Ziolowy</p>
            </div>
            <div class="menu-navigation">
              <a href="koszyk.html">
                <div class="nav-button">
                  <div class="icon">
                    <i class="fas fa-shopping-basket"></i>
                  </div>
                  <h2>Cart (<?php echo 5;?>)</h2>
                </div>
              </a>
              <a href="produkty.html">
                <div class="nav-button">
                  <div class="icon">
                 
                  </div>
                  <h2>Products</h2>
                </div>
              </a>
              <a href="kontakt.html">
                <div class="nav-button">
                    <div class="icon">
      
                    </div>
                    <h2>Contact</h2>
                </div>
              </a>
              <a href="kontakt.html">
                <div class="nav-button">
                    <div class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <h2>
                        <?php
                        

                             {
                                echo<<<html
                                
                                html;
                            }
                        ?> 
                    
                    </h2>
                </div>
              </a>
            </div>
            <div class="copyright">
              <h2>Copyright © 2022</h2>
             <!-- <img src="" alt="" />-->
            </div>
          </div>
	        
          
          <div class="products">
            <div class="titleandsearch">
              <h1>The most recommended product!</h1>
              <!-- <input type="text" /> -->
            </div>
            <div class="cards">
              <div class="card">
                <img src="include/image/rtx2060.png" alt="" />
                <div class="card-info">
                  <h2>Gigabyte GeForce RTX 2060 OC 6GB GDDR6</h2>
                  <p>Układ: GeForce RTX 2060</p>
                  <p>Pamięć: 6 GB</p>
                  <p>Rodzaj pamięci: GDDR6</p>
                  <p>Złącza: HDMI - 1 szt., DisplayPort - 3 szt.</p>
                </div>
                <h2 class="price">280$</h2>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="circle1"></div>
      <div class="circle2"></div>
</body>
</html>

