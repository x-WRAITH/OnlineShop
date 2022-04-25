<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
require("./php/db_connect.php");
if(ISSET($_GET['submode'])){
    if($_GET['submode']=='id'){
    $q="SELECT * FROM users WHERE id='{$_GET['id']}'";
    }} else {
    $q="SELECT * FROM users";
    }
    $result=$connect->query($q);
    echo<<<html
    <a href='admin.php?mode=modes/admin/add&name=users'>Add user</a>
    <table class="table-chess">
        <thead>
            <tr>
                <td>ID</td>
                <td>Type</td>
                <td>Login</td>
                <td>Password</td>
                <td>Email</td>
                <td colspan="2">Management</td>
            </tr>
        </thead>
        <tbody>
    html;
    while($row=$result->fetch_object())
        {
        echo<<<html
                <tr>
                    <td>$row->id</td>
                    <td>$row->type</td>
                    <td>$row->login</td>
                    <td>$row->password</td>
                    <td>$row->email</td>
                    <td><a href='admin.php?mode=modes/admin/modification&id={$row->id}&name=users'>Modification</a></td>
                    <td><a href='admin.php?mode=modes/admin/delete&id={$row->id}&name=users' onclick="return confirm('Czy na pewno chcesz usunąć?')">Delete</a></td>
                </tr>
        html;   
        }
        echo "</tbody> </table>";
        $result->free_result(); 
?>


