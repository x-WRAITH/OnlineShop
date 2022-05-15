<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php   
session_start(); 
session_destroy(); 
header("Location:../index.php"); 
exit();
?>