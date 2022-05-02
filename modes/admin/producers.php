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
require_once('php/db_connect.php');

if(ISSET($_GET['submode'])){
    if($_GET['submode']=='id, producerName'){
    $q="SELECT * FROM producer WHERE id='{$_GET['id']}', producerName='{$_GET['producerName']}'";
    }} else {
    $q="SELECT * FROM producer";
    }
    $result=$connect->query($q);
    echo<<<html
    <a href='admin.php?mode=modes/admin/add&name=producer'>Add producer</a>
    <table class="table-chess">
        <thead>
            <tr>
                <td>ID</td>
                <td>Producer</td>
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
                    <td>$row->producerName</td>
                    <td><a href='admin.php?mode=modes/admin/modification&id={$row->id}&name=producer'>Modification</a></td>
                    <td><a href='admin.php?mode=modes/admin/delete&id={$row->id}&name=producer' onclick="return confirm('Czy na pewno chcesz usunąć?')">Delete</a></td>
                </tr>
        html;   
        }
        echo "</tbody></table>";
        $result->free_result(); 
?>