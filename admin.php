<?php

    session_start();
    if(!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit();
    }
    

    require_once("php/db_connect.php"); 
    $result = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
    while($row=$result->fetch_object())
                {
                echo<<<html
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