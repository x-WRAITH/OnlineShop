<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" >
        <input type="text" name="login"><br>
        <input type="text" name="pass"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
    require_once("php/db_connect.php"); 
    if(isset($_POST["login"]) && isset($_POST["pass"])) {
        $result = $connect->query("SELECT * FROM users WHERE login='{$_POST["login"]}' AND password='{$_POST["pass"]}'");
        $value = $result->num_rows;
        if($value == 1){
            $userType = $result->fetch_assoc();
            if($userType['type'] == 1) {
                echo "Zalogowano";
                $_SESSION["user"] = $userType['id'];
                $_SESSION["admin"]=0;
                var_dump($_SESSION);
                header('Location: admin.php');
            } else {
                echo "Zalogowano";
                $_SESSION["user"] = $userType['id'];
                header('Location: index.php');
            }

        } else
            echo "Nie zalogowano";
    }


?>