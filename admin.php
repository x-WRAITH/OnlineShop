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


require_once("php/db_connect.php");
$result = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">

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
        <div class="menu-navigation">
          <button class="btn-nav noselect">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-users fa-lg"></i>
              </div>
              <h2>Users</h2>
            </div>
          </button>
          <button class="btn-nav">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-list-ul fa-lg"></i>
              </div>
              <h2>Products</h2>
            </div>
          </button>
          <button class="btn-nav">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-list-ul fa-lg"></i>
              </div>
              <h2>Categories</h2>
            </div>
          </button>
          <button class="btn-nav">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-building fa-lg"></i>
              </div>
              <h2>Producers</h2>
            </div>
          </button>
          <button class="btn-nav" id="singOutBtn" onclick="location.replace('models/logout.php');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-sign-out-alt fa-lg"></i>
              </div>
              <h2>Sign Out</h2>
            </div>
            </a>
        </div>
        <div class="copyright">
          <h2>Copyright © 2022</h2>
          <!-- <img src="" alt="" />-->
        </div>
      </div>

      <?php
      while ($row = $result->fetch_object()) {
        echo <<<html
                          <tbody>
                              <tr>
                                  <td>$row->id</td>
                                  <td>$row->type</td>
                                  <td>$row->login</td>
                                  <td>$row->password</td>
                              </tr>
                          </tbody>
                      html;
      }
      
      ?>


    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
</body>

</html>