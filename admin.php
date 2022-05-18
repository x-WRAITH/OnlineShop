<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php

session_start();
if (!isset($_SESSION["admin"])) {
  $message = "Access denied! You don\'t have permission.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>location.replace('index.php')</script>";
  exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/mode.css">

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
          <p>Admin Dashboard</p>
        </div>
        <div class="menu-navigation" >
          <button class="btn-nav noselect" onclick="location.replace('index.php');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-arrow-left fa-lg"></i>
              </div>
              <h2>Return</h2>
            </div>
          </button>
          <button class="btn-nav noselect" onclick="location.replace('?mode=modes/admin/users');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-users fa-lg"></i>
              </div>
              <h2>Users</h2>
            </div>
          </button>
          <button class="btn-nav" onclick="location.replace('?mode=modes/admin/products');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-list-ul fa-lg"></i>
              </div>
              <h2>Products</h2>
            </div>
          </button>
          <button class="btn-nav" onclick="location.replace('?mode=modes/admin/categories');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-list-ul fa-lg"></i>
              </div>
              <h2>Categories</h2>
            </div>
          </button>
          <button class="btn-nav" onclick="location.replace('?mode=modes/admin/producers');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-building fa-lg"></i>
              </div>
              <h2>Producers</h2>
            </div>
          </button>
          <button class="btn-nav" id="singOutBtn" onclick="location.replace('modes/logout.php');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-sign-out-alt fa-lg"></i>
              </div>
              <h2>Sign Out</h2>
            </div>
          </button>
        </div>
        <div class="copyright">
          <h2>Copyright © 2022</h2>
          <!-- <img src="" alt="" />-->
        </div>
      </div>

      <div id="right_products"> 
      <?php
      if(ISSET($_GET['mode'])) {
        if(FILE_EXISTS("{$_GET['mode']}.php")) { require_once("{$_GET['mode']}.php"); }
        } else { echo "<div>Plik został nie odnaleziony!</div><br>";}
      ?>
      </div>

    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
  <script src="js/onscroll.js"></script>
</body>

</html>