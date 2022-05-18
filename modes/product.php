<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
$result = $connect->query("SELECT * FROM products WHERE id='{$_GET['id']}'");
$row = $result->fetch_object();
echo <<< html
<p>$row->name</p>
<p>$row->description</p>
<p>$row->price</p>

html;


?>