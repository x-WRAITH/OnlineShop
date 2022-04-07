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
    <table class="table-chess">
        <thead>
            <tr>
                <td>ID</td>
                <td>Category</td>
            </tr>
        </thead>
    html;
    while($row=$result->fetch_object())
        {
        echo<<<html
            <tbody>
                <tr>
                    <td>$row->id</td>
                    <td>$row->categoryName</td>
                    <td><a href='index.php?mode=modes/modification&id={$row->id}'>Modification</a></td>
                    <td><a href='index.php?mode=modes/delete&id={$row->id}' onclick="return confirm('Czy na pewno chcesz usunąć tą osobę?')">Delete</a></td>
                </tr>
            </tbody>
        html;   
        }
        echo "</table>";
        $result->free_result(); 
?>