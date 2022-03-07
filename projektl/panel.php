<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep z Ramami</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div>
        <div>
            <div id="naglowek">
                <h1 style="margin: 0px; padding-top: 10px; padding-bottom: 10px;">Sklep z Ramem</h1>
                <div style="display: flex;">
                    <div id="navi">
                        <form action="kosz.php" method="POST">
                            <input type="submit" name="koszyk" value="Koszyk" id="przycisk1">
                        </form>
                    </div>
                    <div id="navi">
                        <form action="index.php" method="POST">
                            <input type="submit" value="Strona główna" style="border: 0px;background-color: goldenrod;width: 100%;height: 100%;font-size: 50px;">
                        </form>
                    </div>
                    <div id="navi">
                        <form action="panel.php" method="POST">
                            <input type="submit" name="panel" value="Panel" id="przycisk2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div id="zawartosc">
                    <div style="text-align:center;">
                    <h1 style="margin: 0px;">Witaj w panelu</h1>
                    <br>
                    <form action="panel.php" method="POST">
                        <input type="submit" name="kategoria" value="Kategoria">
                    </form>
                    <br>
                    <form action="panel.php" method="POST">
                        <input type="submit" name="produkt" value="Produkt">
                    </form>
                    <br>
                    <?php
                        require_once("connect.php");
                        error_reporting(E_ALL ^ E_NOTICE);

                        if($_POST['produkt']=="Produkt")
                        {
                            echo "<h1 style='margin:0px'>Co chcesz zrobić ?</h1>";
                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='dodawaniepro' value='Dodawanie'>
                            </form>
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='modyfikacjapro' value='Modyfikacja'>
                            </form>
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='usunpro' value='Usuawanie'>
                            </form>
                            ";
                        }

                        if($_POST['modyfikacjapro']=="Modyfikacja")
                        {
                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='hidden' name='wyborkat' value='tak'>
                                <select name='jakipro'>";

                                $query="SELECT * FROM `produkt`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_produktu'>$row->nazwa</option>";
                                }

                        echo"   
                                </select>
                                <br>
                                <br>
                                <input type='submit' value='Modyfikuj Produkt'>
                            </form>
                        ";
                        }

                        if($_POST['wyborkat']=="tak")
                        {
                            $id=$_POST['jakipro'];

                            echo "
                                <form action='panel.php' method='POST'>
                                    <h1>Podaj nazwe</h1>
                                    <input type='text' name='nazwa' required maxlength='20'>
                                    <input type='hidden' name='znp' value='tak'>
                                    <input type='hidden' name='co' value='$id'>
                                    <br>
                                    <input type='submit' value='Zmien nazwe'>
                                </form>

                                <form action='panel.php' method='POST'>
                                <h1>Podaj cene</h1>
                                <input type='number' name='cena' min='1' max='100000' maxlength='11' >
                                <input type='hidden' name='zcp' value='tak'>
                                <input type='hidden' name='co' value='$id'>
                                <br>
                                <input type='submit' value='Zmien cene'>
                            </form>

                            <form action='panel.php' method='POST'>
                            <h1>Wybierz kategorie</h1>
                                <select name='jakakategoria' >";

                                $query="SELECT * FROM `kategoria`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_kategoria'>$row->nazwa</option>";
                                }

                        echo"   
                            </select>
                            <input type='hidden' name='zkp' value='tak'>
                            <input type='hidden' name='co' value='$id'>
                            <br>
                            <input type='submit' value='Zmien kategorie'>
                        </form>

                        
                        <form action='panel.php' method='POST'>
                        <h1>Podaj opis</h1>
                        <input type='text' name='opis' required maxlength='1000'>
                        <input type='hidden' name='zop' value='tak'>
                        <input type='hidden' name='co' value='$id'>
                        <br>
                        <input type='submit' value='Zmien opis'>
                    </form>

                    <form action='panel.php' method='POST' enctype='multipart/form-data'>
                    <h1>Zmień zdjęcie</h1>
                    <input type='hidden' name='size' value='100000000'>
                    <input type='file' name='zdjecie' required>
                    <input type='hidden' name='zzp' value='tak'>
                    <input type='hidden' name='co' value='$id'>
                    <br>
                    <input type='submit' value='Zmien zdjęcie'>
                </form>

                <form action='panel.php' method='POST' enctype='multipart/form-data'>
                <h1>Podaj ilosc</h1>
                <input type='number' name='ilosc' min='1' max='100000' maxlength='11' required>
                <input type='hidden' name='zip' value='tak'>
                <input type='hidden' name='co' value='$id'>
                <br>
                <input type='submit' value='Zmien ilość'>
            </form>
                            ";
                        }
                        
                        if($_POST['zip']=="tak")
                        {
                            $id=$_POST['co'];
                            $ilosc=$_POST['ilosc'];

                            $query="UPDATE `produkt` SET `ilosc`=$ilosc WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['zzp']=="tak")
                        {

                            $cel="IMG/".basename($_FILES['zdjecie']['name']);

                            $id=$_POST['co'];
                            $zdjecie=$_FILES['zdjecie']['name'];

                            move_uploaded_file($_FILES['zdjecie']['tmp_name'],$cel);

                            $query="UPDATE `produkt` SET `zdjecie`='$zdjecie' WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['zop']=="tak")
                        {
                            $id=$_POST['co'];
                            $opis=$_POST['opis'];

                            $query="UPDATE `produkt` SET `opis`='$opis' WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['zkp']=="tak")
                        {
                            $id=$_POST['co'];
                            $kat=$_POST['jakakategoria'];

                            $query="UPDATE `produkt` SET `id_kategoria`=$kat WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }
                        
                        if($_POST['zcp']=="tak")
                        {
                            $id=$_POST['co'];
                            $cena=$_POST['cena'];

                            $query="UPDATE `produkt` SET `cena`=$cena WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['zcp']=="tak")
                        {
                            $id=$_POST['co'];
                            $cena=$_POST['cena'];

                            $query="UPDATE `produkt` SET `cena`=$cena WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['dodawaniepro']=="Dodawanie")
                        {
                            echo "
                            <form action='panel.php' method='POST' enctype='multipart/form-data'>
                                <h1>Podaj nazwe</h1>
                                <input type='text' name='nazwa' required maxlength='20'>
                                <input type='hidden' name='dodajpro' value='tak'>
                                <h1>Podaj cene</h1>
                                <input type='number' name='cena' min='1' max='100000' maxlength='11' >
                                <h1>Wybierz kategorie</h1>
                                <select name='jakakategoria' >";

                                $query="SELECT * FROM `kategoria`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_kategoria'>$row->nazwa</option>";
                                }

                        echo"   
                                </select>
                                <br>
                                <h1>Podaj opis</h1>
                                <input type='text' name='opis' required maxlength='1000'>
                                <h1>Dodaj zdjęcie</h1>
                                <input type='hidden' name='size' value='100000000'>
                                <input type='file' name='zdjecie' required>
                                <br>
                                <h1>Podaj ilosc</h1>
                                <input type='number' name='ilosc' min='1' max='100000' maxlength='11' required>
                                <br>
                                <br>
                                <input type='submit' value='Dodaj produkt'>
                            </form>
                            ";
                        }

                        if($_POST['usunpro']=="Usuawanie")
                        {
                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='hidden' name='usunprod' value='tak'>
                                <select name='jakipro'>";

                                $query="SELECT * FROM `produkt`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_produktu'>$row->nazwa</option>";
                                }

                        echo"   
                                </select>
                                <br>
                                <br>
                                <input type='submit' value='Usuń Produkt'>
                            </form>
                        ";
                        }

                        if($_POST['usunprod']=="tak")
                        {
                            $id=$_POST['jakipro'];

                            $query="DELETE FROM `produkt` WHERE `id_produktu`=$id";
                            $connect->query($query);
                        }

                        if($_POST['dodajpro']=="tak")
                        {
                            $cel="IMG/".basename($_FILES['zdjecie']['name']);

                            $nazw=$_POST['nazwa'];
                            $cena=$_POST['cena'];
                            $kat=$_POST['jakakategoria'];
                            $opis=$_POST['opis'];
                            $zdjecie=$_FILES['zdjecie']['name'];
                            $ilosc=$_POST['ilosc'];

                            $query="SELECT * FROM `produkt` WHERE `nazwa`='$nazwa'";
                            $res=$connect->query($query);

                            $ile=$wyn->num_rows;
                            if($ile==0)
                            {
                            move_uploaded_file($_FILES['zdjecie']['tmp_name'],$cel);

                            $query2="INSERT INTO `produkt`(`nazwa`, `cena`, `id_kategoria`, `opis`, `zdjecie`, `ilosc`) VALUES ('$nazw',$cena,$kat,'$opis','$zdjecie',$ilosc)";
                            $connect->query($query2);
                            }
                            else
                            {
                            echo "<span style='color:red'>Taki produkt znajduje się już w bazie !</span>";
                            }

                        }

                        if($_POST['kategoria']=="Kategoria")
                        {
                            echo "<h1 style='margin:0px'>Co chcesz zrobić ?</h1>";
                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='dodawanie' value='Dodawanie'>
                            </form>
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='modyfikacja' value='Modyfikacja'>
                            </form>
                            <form action='panel.php' method='POST'>
                                <input type='submit' name='usun' value='Usuawanie'>
                            </form>
                            ";
                        }

                        if($_POST['usun']=="Usuawanie")
                        {

                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='hidden' name='usunpro' value='tak'>
                                <select name='jakipro'>";

                                $query="SELECT * FROM `kategoria`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_kategoria'>$row->nazwa</option>";
                                }

                        echo"   
                                </select>
                                <br>
                                <br>
                                <input type='submit' value='Usuń Kategorie'>
                            </form>
                        ";
                        }

                        if($_POST['usunkat']=="tak")
                        {
                            $id=$_POST['jakakategoria'];

                            $query="DELETE FROM `kategoria` WHERE `id_kategoria`=$id";
                            $connect->query($query);
                        }

                        if($_POST['dodawanie']=="Dodawanie")
                        {
                            echo "
                            <form action='panel.php' method='POST' enctype='multipart/form-data'>
                                <h1>Podaj nazwe</h1>
                                <input type='text' name='nazwa' required maxlength='20'>
                                <input type='hidden' name='dodaj' value='tak'>
                                <h1>Dodaj zdjęcie</h1>
                                <input type='hidden' name='size' value='100000000'>
                                <input type='file' name='zdjecie' required>
                                <br>
                                <br>
                                <input type='submit' value='Dodaj kategorie'>
                            </form>
                            ";
                        }

                        if($_POST['dodaj']=="tak")
                        {
                            $cel="IMG/".basename($_FILES['zdjecie']['name']);

                            $nazwa=$_POST['nazwa'];
                            $zdjecie=$_FILES['zdjecie']['name'];

                            $query="SELECT * FROM `kategoria` WHERE `nazwa`='$nazwa'";
                            $res=$connect->query($query);

                            $ile=$wyn->num_rows;
                            if($ile==0)
                            {
                            move_uploaded_file($_FILES['zdjecie']['tmp_name'],$cel);

                            $query2="INSERT INTO `kategoria`(`nazwa`, `zdjecie`) VALUES ('$nazwa','$zdjecie')";
                            $connect->query($query2);
                            }
                            else
                            {
                            echo "<span style='color:red'>Taka kategoria znajduje się już w bazie !</span>";
                            }
                        }

                        if($_POST['modyfikacja']=="Modyfikacja")
                        {
                            echo "
                            <form action='panel.php' method='POST'>
                                <input type='hidden' name='modyfikacjakategori' value='tak'>
                                <select name='jakakategoria'>";

                                $query="SELECT * FROM `kategoria`";
                                $res=$connect->query($query);
                                while($row=$res->fetch_object())
                                {
                                    echo "<option value='$row->id_kategoria'>$row->nazwa</option>";
                                }

                        echo"   
                                </select>
                                <br>
                                <br>
                                <input type='submit' value='Wybierz kategorie'>
                            </form>
                        ";
                        }

                        if($_POST['modyfikacjakategori']=="tak")
                        {
                            $ktorakat=$_POST['jakakategoria'];

                            echo "
                                <form action='panel.php' method='POST'>
                                    <h1>Zmień nazwe:</h1>
                                    <input type='text' name='nazwa' required maxlength='20'>
                                    <input type='hidden' name='zn' value='tak'>
                                    <input type='hidden' name='co' value='$ktorakat'>
                                    <br>
                                    <br>
                                    <input type='submit' value='Zmien nazwe'>
                                </form>

                                <form action='panel.php' method='POST' enctype='multipart/form-data'>
                                <h1>Zmień obraz:</h1>
                                <input type='hidden' name='size' value='100000000'>
                                <input type='hidden' name='co' value='$ktorakat'>
                                <input type='hidden' name='zo' value='tak'>
                                <input type='file' name='zdjecie' required>
                                <br>
                                <br>
                                <input type='submit' value='Zmien obraz'>
                            </form>
                            ";
                        }

                        if($_POST['zn']=="tak")
                        {
                            $nazwa=$_POST['nazwa'];
                            $id=$_POST['co'];

                            $query="UPDATE `kategoria` SET `nazwa`='$nazwa' WHERE `id_kategoria`=$id";
                            $connect->query($query);
                        }

                        if($_POST['zo']=="tak")
                        {
                            $cel="IMG/".basename($_FILES['zdjecie']['name']);

                            $id=$_POST['co'];
                            $zdjecie=$_FILES['zdjecie']['name'];

                            move_uploaded_file($_FILES['zdjecie']['tmp_name'],$cel);

                            $query="UPDATE `kategoria` SET `zdjecie`='$zdjecie' WHERE `id_kategoria`=$id";
                            $connect->query($query);
                        }

                    ?>
                    <div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div id="stopka" style="display: flex;">
                    <div class="contener">
                        <h2>Dane :</h2>
                        <p>Telefon: 856125478</p>
                        <p>E-mail: 123@456.com</p>
                    </div>
                    <div class="contener">
                        <h2>Opcje dostawy: </h2>
                        <p>Odbiór osobisty</p>
                        <p>Kurier</p>
                        <p>Poczta</p>
                    </div>
                    <div class="contener">
                        <h2>O nas:</h2>
                        <p>W naszym sklepie można kupić tylko pamięć ram do komputera! Tylko tyle lub aż tyle. Mamy umowę partnerską z wieloma firmami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $connect->close();
    ?>
</body>
</html>