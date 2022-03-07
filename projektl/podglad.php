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
                    <div>
                    <?php
                        require_once("connect.php");

                        error_reporting(E_ALL ^ E_NOTICE);

                        $kategoria=$_POST['ktora'];

                        $query="SELECT * FROM `produkt` WHERE `id_kategoria`=$kategoria";
                        $res=$connect->query($query);
                        while($row=$res->fetch_object())
                        {
                            echo "
                            <div style='display: flex;'>
                                <div id='zdjecie'>
                                    <img src='IMG/$row->zdjecie' alt='Produkt'>
                                </div>
                                <div id='zawartoscproduktu'>
                                    <h1>$row->nazwa</h1>
                                </div>
                                <div id='panel'>
                                    <h1>Cena:</h1>
                                    <span>$row->cena zł</span>
                                    <h1>Dostępne sztuki:</h1>
                                    <span>$row->ilosc szt</span>
                                    <form action='dodajdokosz.php' method='POST'>
                                        <input type='hidden' name='id' value='$row->id_produktu'>
                                        <input type='number' name='iloscpr' value='1' max='$row->ilosc' min='1'>
                                        <br>
                                        <input type='submit' value='Dodaj do koszyka'>
                                    </form>
                                    <form action='podgladproduktu.php' method='POST'>
                                        <input type='hidden' name='ktoryprodukt' value='$row->id_produktu'>
                                        <input type='submit' value='Pokaż produkt'>
                                    </form>
                                </div>
                            </div>
                            ";
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