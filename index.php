<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
require_once('php/db_connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
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
          <p>Sklep Ziolowy</p>
        </div>
        <div class="menu-navigation">
          <button class="btn-nav noselect">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-shopping-cart fa-lg"></i>
              </div>
              <h2>Cart(<?php echo 5; ?>)</h2>
            </div>
          </button>
          <button class="btn-nav" onclick="location.replace('?mode=modes/products');">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-list-ul fa-lg"></i>
              </div>
              <h2>Products</h2>
            </div>
          </button>
          <button class="btn-nav ">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-headset fa-lg"></i>
              </div>
              <h2>Contact</h2>
            </div>
          </button>
          <button class="btn-nav" id="signInBtn">
            <div class="nav-button">
              <div class="icon">
                <i class="fas fa-sign-in-alt fa-lg"></i>
              </div>
              <h2>Sign In</h2>
            </div>
            </a>
        </div>
        <div class="copyright">
          <h2>Copyright © 2022</h2>
          <!-- <img src="" alt="" />-->
        </div>
      </div>

      <div id="myModal" class="modal">


        <div class="container" id="container">
          <!-- sign in page -->
          <div class="form-container sign-in-container">
            <form method="POST" class="form" id="login">
              <h1 class="form__title">Login</h1>
              <div class="form__input-group">
                <label for="username">Username: </label>
                <input type="text" class="form__input" name="login_log" id="username_log" maxlength="20" required>
              </div>
              <div class="form__input-group">
                <label for="pass">Password: </label>
                <input type="password" class="form__input" name="pass_log" id="pass_log" maxlength="20" required>
              </div>
              <div class="form__input-group">
                <button name="btnSignIn" type="submit" class="form__button">Sign In</button>
              </div>
            </form>
          </div>
          <?php
          if (isset($_POST['btnSignIn'])) {
            $result = $connect->query("SELECT * FROM users WHERE login='{$_POST["login_log"]}' AND password='{$_POST["pass_log"]}'");
            $value = $result->num_rows;
            if ($value == 1) {
              echo "Zalogowano";
              $userType = $result->fetch_assoc();
              if ($userType['type'] == 1) {
                $_SESSION["user"] = $userType['id'];
                $_SESSION["admin"] = true;
                header('Location: admin.php');
              } else {
                $_SESSION["user"] = $userType['id'];
              }
            } else {echo "<script>alert('Not logged in! The data is incorrect');</script>";}
          } 
          ?>

          <!--  create account page -->
          <div class="form-container sign-up-container">
            <form method="POST" class="form" id="register">
              <h1 class="form__title">Register</h1>
              <div class="form__input-group">
                <label for="username"> Username: </label>
                <input type="text" class="form__input_" name="username_reg" id="username_reg" maxlength="20" required>
              </div>
              <div class="form__input-group">
                <label for="pass">Password: </label>
                <input type="password" class="form__input" name="pass_reg" id="pass_reg" maxlength="20" required>
              </div>
              <button name="btnSignUp" class="form__button" type="submit">Sign Up</button>
            </form>
          </div>
          <div class="overlay-container">
            <div class="overlay">
              <div class="overlay-panel overlay-left">
                <h1 class="h1-login">Welcome Back!</h1>
                <p class="p-login">Please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In!</button>
              </div>
              <div class="overlay-panel overlay-right">
                <h1 class="h1-login">Hello, Friend!</h1>
                <p class="p-login">Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up!</button>
              </div>
            </div>
          </div>
        </div>

      </div>
        <?php

        if (isset($_GET['mode'])) {
          if (FILE_EXISTS("{$_GET['mode']}.php")) {
            require_once("{$_GET['mode']}.php");
          }
        } else {
          echo <<< html
          <div class="products">
          <div class="titleandsearch">
            <h1>The most recommended product!</h1>
            <!-- <input type="text" /> -->
          </div>
          html;
          $result = $connect->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
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
              html;
          } echo "</div>";
        }
        ?>

      </div>
    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
  <script src="js/signinup.js"></script>
</body>

</html>