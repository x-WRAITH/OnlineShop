<?php
require("./php/db_connect.php");
$site=null;

var_dump($_GET);
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
        $site=$table;
    }

    $query_del="DELETE FROM $table WHERE id={$_GET['id']}";
    $connect->query($query_del);
    header("Location: admin.php?mode=modes/admin/{$site}");
}
?>