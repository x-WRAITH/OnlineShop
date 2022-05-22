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
  <link rel="stylesheet" href="css/alerts.css">

  <link rel="shortcut icon" href="include/image/logo64x64.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


  <title>AroShop - Herbal Shop</title>

</head>

<?php
if (isset($_POST['btnSignIn'])) {
  $result = $connect->query("SELECT * FROM users WHERE email='{$_POST["email_log"]}' AND password='{$_POST["pass_log"]}'");
  $value = $result->num_rows;
  if ($value == 1) {
    echo '<script>alert("Success! Logged in.");</script>';
    $userType = $result->fetch_assoc();
    if ($userType['type'] == 1) {
      $_SESSION["user"] = $userType['id'];
      $_SESSION["admin"] = true;
      header("Location: index.php");
    } else {
      $_SESSION["user"] = $userType['id'];
      header("Location: index.php");
    }
  } else {
    header("Location: index.php");
    echo '<script>alert("Warning! Given email or password is not correct!");</script>';
  }
}

if (isset($_POST['btnSignUp'])) {
  $result = $connect->query("SELECT * FROM users WHERE email='{$_POST['email_reg']}'");
  $value = $result->num_rows;
  if ($value==0) {
    $connect->query("INSERT INTO users ( email, password ) VALUES ( '{$_POST['email_reg']}', '{$_POST['pass_reg']}' )");
    echo '<script>alert("Success! Your account has been created! You can log in.");</script>';
    header("Location: index.php");
  } else {
    echo '<script>alert("Warning! Given email is already taken!");</script>';
    header("Location: index.php");
  }
}
?>

<body>
  <main>
    <section class="shop">
      <div class="dashboard">
        <div id="shopinformation">
          <img alt="logo" src="images/Aro-logo-whitemode.png">
          <p>Herbal Shop</p>
        </div>
        <div class="menu-navigation">
          <?php
          if (isset($_SESSION["admin"])) {
            echo <<< html
                <button class="btn-nav noselect" onclick="location.replace('admin.php');">
                  <div class="nav-button">
                    <div class="icon">
                      <i class="fas fa-wrench fa-lg"></i>
                    </div>
                    <h2>Admin Dashboard</h2>
                  </div>
                </button>
              html;
          }
          if (isset($_SESSION["user"])) {
            $id = $_SESSION["user"];
            $result = $connect->query("SELECT * FROM users WHERE id={$id}");
            echo <<< html
                  <button class="btn-nav noselect" onclick="location.replace('?mode=modes/user');">
                    <div class="nav-button">
                      <div class="icon">
                        <i class="fas fa-user fa-lg"></i>
                      </div>
                html;
            while ($row = $result->fetch_object()) {
              echo "<h2>Hi, $row->firstname</h2>";
            }
            echo "</div></button>";
          }
          ?>
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
          <?php
          if (!isset($_SESSION["user"])) {
            echo <<< html
              <button class="btn-nav" id="signInBtn">
                <div class="nav-button">
                  <div class="icon">
                    <i class="fas fa-sign-in-alt fa-lg"></i>
                  </div>
                  <h2>Sign In</h2>
                </div>
              </button>
            html;
          } else {
            echo <<<html
              <button class="btn-nav" id="singOutBtn" onclick="location.replace('modes/logout.php');">
                <div class="nav-button">
                  <div class="icon">
                    <i class="fas fa-sign-out-alt fa-lg"></i>
                  </div>
                  <h2>Sign Out</h2>
                </div>
              </button>
            html;
          }
          ?>
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
            <form method="POST" class="formlr" id="login">
              <h1 class="form__title">Login</h1>
              <div class="form__input-group">
                <label for="username">E-mail: </label>
                <input type="email" class="form__input" placeholder="e.g. wojteknowak02@gmail.com" name="email_log" id="email_log" maxlength="20" required>
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
          <!--  create account page -->
          <div class="form-container sign-up-container">
            <form method="POST" class="formlr" id="register">
              <h1 class="form__title">Register</h1>
              <div class="form__input-group">
                <label for="username"> E-mail: </label>
                <input type="email" class="form__input_" placeholder="e.g. wojteknowak02@gmail.com" name="email_reg" id="email_reg" maxlength="20" required>
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
      <div id="right_products">

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
          </div>
          html;
          $result = $connect->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
          while ($row = $result->fetch_object()) {
            $out = strlen($row->description) > 50 ? substr($row->description, 0, 50) . "... <a href='index.php?mode=modes/product&id={$row->id}'>see more..</a>" : $row->description;
            echo <<< html
              <div class="cards">
                <div class="card">
                  <img src="$row->image1" alt="" />
                  <div class="card-info">
                    <h2 style="">$row->name</h2>
                    <p>$out</p>
                  </div>
                  <form method="POST" style="all: none;">
                    <input type="hidden" name="hidden_name" value="$row->name" />
                    <input type="hidden" name="hidden_price" value="$row->price" />
                    <input type="hidden" name="hidden_id" value="$row->id" />
                    <h2 class="price">$$row->price</h2>
                    <input type="text" name="quantity" value="1" class="form-control" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                  </form>
                </div>
              html;
          }
          echo "</div>";
        }
        ?>
      </div>
      </div>
    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
  <script src="js/signinup.js"></script>
  <script src="js/onscroll.js"></script>
  <script src="js/function.js"></script>
</body>

</html>