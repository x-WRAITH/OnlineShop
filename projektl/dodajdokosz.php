<?php
require_once("connect.php");
error_reporting(E_ALL ^ E_NOTICE);

$produkt=$_POST['id'];
$ilos=$_POST['iloscpr'];
echo $produkt;
echo $ilos;

$query="INSERT INTO `koszyk`(`id_produkt`, `ilosc`) VALUES ($produkt,$ilos)";
$connect->query($query);

header("Location: kosz.php");

$connect->close();
?>