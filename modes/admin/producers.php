<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
require_once('php/db_connect.php');

if(ISSET($_GET['submode'])){
    if($_GET['submode']=='id, producerName'){
    $q="SELECT * FROM producer WHERE id='{$_GET['id']}', producerName='{$_GET['producerName']}'";
    }} else {
    $q="SELECT * FROM producer";
    }
    $result=$connect->query($q);
    echo<<<html
    <table class="table-chess">
        <thead>
            <tr>
                <td>ID</td>
                <td>Producer</td>
            </tr>
        </thead>
    html;
    while($row=$result->fetch_object())
        {
        echo<<<html
            <tbody>
                <tr>
                    <td>$row->id</td>
                    <td>$row->producerName</td>
                    <td><a href='index.php?mode=modes/modification&id={$row->id}'>Modification</a></td>
                    <td><a href='index.php?mode=modes/delete&id={$row->id}' onclick="return confirm('Czy na pewno chcesz usunąć tą osobę?')">Delete</a></td>
                </tr>
            </tbody>
        html;   
        }
        echo "</table>";
        $result->free_result(); 
?>
 //<script type='text/javascript'>alert('ATTENTION! In this panel, the residual data is displayed, in order to have access to more data, click modify.');</script>