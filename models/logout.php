<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php   
session_start(); 
session_destroy(); 
header("location:../index.php"); 
exit();
?>