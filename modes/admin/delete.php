<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
if (!isset($_SESSION["admin"])) {
    $message = "Access denied! You don\'t have permission.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>location.replace('index.php')</script>";
    exit();
}
require_once("./php/db_connect.php");
if($_GET['mode']=='modes/admin/delete')
{
    if(isset($_GET["name"])) {
        if($_GET["name"] == "products") {
            $table = "products";
        } else if($_GET["name"] == "category"){
            $table = "category";
        } else if($_GET["name"] == "producer"){
            $table = "producer";
        } else if($_GET["name"] == "users"){
            $table = "users";
        }
    }

    $query_del="DELETE FROM $table WHERE id={$_GET['id']}";
    $connect->query($query_del);
    header("Location: admin.php?mode=modes/admin/{$table}");
}
?>