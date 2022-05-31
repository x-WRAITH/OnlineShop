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


if(ISSET($_GET['mode'])){
        $q="SELECT * FROM products";
    
    }
    $result=$connect->query($q);
    echo<<<html
    <table class="table-chess">
    <a href='admin.php?mode=modes/admin/add&name=products'>Add product</a>
        <thead>
            <tr>
                <td>ID</td>
                <td>Product</td>
                <td>Price</td>
                <td>Amount</td>
                <td>Description</td>
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
                    <td>$row->name</td>
                    <td>$row->price PLN</td>
                    <td>$row->amount</td>
                    <td>$row->description</td>
                    <td><a href='admin.php?mode=modes/admin/modification&id={$row->id}&name=products'>Modification</a></td>
                    <td><a href='admin.php?mode=modes/admin/delete&id={$row->id}&name=products' onclick="return confirm('Czy na pewno chcesz usunąć?')">Delete</a></td>
                </tr>
        html;   
        }
        echo "</tbody></table>";
        $result->free_result(); 
?>