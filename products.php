<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
    session_start();
    require_once("php/db_connect.php"); 
    $result = $connect->query("SELECT * FROM products");
    while($row=$result->fetch_object())
                {
                echo<<<html
                    <tbody>
                        <tr>
                            <td>$row->id</td>
                            <td>$row->productName</td>
                            <td>$row->productPrice</td>
                        </tr>
                    </tbody>
                    <br>
                html;   
                }
?>