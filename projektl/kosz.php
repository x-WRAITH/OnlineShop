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
                    $suma=0;
                        require_once("connect.php");

                        error_reporting(E_ALL ^ E_NOTICE);

                        $query="SELECT * FROM `koszyk`";
                        $res=$connect->query($query);
                        while($row=$res->fetch_object())
                        {
                            $query2="SELECT * FROM `produkt` WHERE `id_produktu`=$row->id_produkt";
                            $res2=$connect->query($query2);

                            while($row2=$res2->fetch_object())
                            {
                                echo"
                        <div style='display: flex;'>
                                <div id='zdjecie'>
                                    <img src='IMG/$row2->zdjecie' alt='Produkt'>
                                </div>
                                <div id='zawartoscproduktu'>
                                    <h1>$row2->nazwa</h1>
                                </div>
                                <div id='panel'>
                                    <h1>Cena:</h1>
                                    <span>$row2->cena zł</span>
                                    <h1>Ilość sztuki:</h1>
                                    <span>$row->ilosc szt</span>
                                <form action='usun.php' method='POST'>
                                    <input type='hidden' name='id' value='$row->id_produkt'>
                                    <input type='number' name='iloscpr' value='1' max='$row->ilosc' min='1'>
                                    <br>
                                    <input type='submit' value='Usuń z koszyka'>
                                </form>
                                <form action='podgladproduktu.php' method='POST'>
                                    <input type='hidden' name='ktoryprodukt' value='$row->id_produkt'>
                                    <input type='submit' value='Pokaż produkt'>
                                </form>
                            </div>
                        </div>
                            ";
                            $suma=$suma+($row->ilosc*$row2->cena);
                            }
                        }
                    ?>
                    <div>
                </div>
            </div>
        </div>
        <div>
            <div id="zawartosc">
                <?php
                    echo "<h1 style='margin: 0px;'>Łączna suma: $suma zł + koszt dostawy</h1>";
                ?>
                <form action='index.php' method='POST'>
                <input type='radio' id='sam' name='dostawa' value='0' checked>
                <label for='sam'>Odbiór osobisty: za darmo</label>
                <br>
                <input type='radio' id='kurier' name='dostawa' value='15'>
                <input type="hidden" name="koniec" value="tak">
                <label for='kurier'>Kurier: 15 zł</label>
                <br>
                <input type='radio' id='poczta' name='dostawa' value='10'>
                <label for='poczta'>Poczta: 10 zł</label>
                <br>
                <input type='submit' value='Złóż zamuwienie'>
                </form>
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