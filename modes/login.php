<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
session_start();
require_once("../php/db_connect.php");
    if (isset($_POST["login_log"]) && isset($_POST["pass_log"])) {
        $result = $connect->query("SELECT * FROM users WHERE login='{$_POST["login_log"]}' AND password='{$_POST["pass_log"]}'");
        $value = $result->num_rows;
        if ($value == 1) {
          $userType = $result->fetch_assoc();
          if ($userType['type'] == 1) {
            echo "Zalogowano";
            $_SESSION["user"] = $userType['id'];
            $_SESSION["admin"] = true;
            header('Location: /admin.pgp');
          } else {
            echo "Zalogowano";
            $_SESSION["user"] = $userType['id'];
            header("Location: ../index.php");
          }
        } else
        echo "<script>alert('Not logged in!');</script>";
      }
?>