<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
require_once('php/db_connect.php');


if(ISSET($_GET['mode'])){
        echo<<<html
            <div class="menu_admin">
                <a href='admin.php?mode=modes/admin/add&name=products'>Add product</a>
                <div class="sorts">
                <form method="POST">
                    <select name="sort" id="sorts">
                        <option value="random" selected="selected">Losowo</option>
                        <option value="htol">Od najwyższej</option>
                        <option value="ltoh">Od najniższej</option>
                    </select>
                </form>
                </div>
            </div>
        html;
        $q="SELECT * FROM products ORDER BY rand()";
    
    }
    $result=$connect->query($q);
    echo<<<html
    <table class="table-chess">
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