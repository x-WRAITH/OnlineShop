<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
require_once('php/db_connect.php');

if(ISSET($_GET['submode'])){
    if($_GET['submode']=='id, categoryName'){
    $q="SELECT * FROM category WHERE id='{$_GET['id']}', categoryName='{$_GET['categoryName']}'";
    }} else {
    $q="SELECT * FROM category";
    }
    $result=$connect->query($q);
    echo<<<html
    <a href='admin.php?mode=modes/admin/add&name=category'>Add category</a>
    <table class="table-chess">
        <thead>
            <tr>
                <td>ID</td>
                <td>Category</td>
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
                    <td>$row->categoryName</td>
                    <td><a href='admin.php?mode=modes/admin/modification&id={$row->id}&name=category'>Modification</a></td>
                    <td><a href='admin.php?mode=modes/admin/delete&id={$row->id}&name=category' onclick="return confirm('Czy na pewno chcesz usunąć?')">Delete</a></td>
                </tr>
        html;   
        }
        echo "</tbody></table>";
        $result->free_result(); 
?>