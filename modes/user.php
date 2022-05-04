<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
    require("./php/db_connect.php");
    $result = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
    while($row=$result->fetch_object())
    {
    echo<<<html
                <p>$row->id</p>
                <p>$row->type</p>
                <p>$row->email</p>
                <p>$row->firstname</p>
                <p>$row->lastname</p>
    html;   
    }
?>