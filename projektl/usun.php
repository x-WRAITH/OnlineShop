<?php
    require_once("connect.php");
    error_reporting(E_ALL ^ E_NOTICE);

    $produkt=$_POST["id"];
    $ilosc=$_POST["iloscpr"];

    $query="SELECT * FROM `koszyk` WHERE `id_produkt`=$produkt";
    $res=$connect->query($query);
    while($row=$res->fetch_object())
    {
        if($row->ilosc==$ilosc)
        {
            $query3="DELETE FROM `koszyk` WHERE `id_produkt`=$produkt";
            $connect->query($query3); 
        }
        else
        {
            $query2="UPDATE `koszyk` SET `ilosc`=$row->ilosc-$ilosc WHERE id_produkt=$produkt";
            $connect->query($query2);
        }
    }

    header("Location: kosz.php");
?>