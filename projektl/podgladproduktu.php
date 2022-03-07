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
                    <div style='text-align:center;'>
                    <?php
                        require_once("connect.php");
                        error_reporting(E_ALL ^ E_NOTICE);

                        $produkt=$_POST['ktoryprodukt'];

                        $query="SELECT * FROM `produkt` WHERE `id_produktu`=$produkt";
                        $res=$connect->query($query);

                        while($row=$res->fetch_object())
                        {
                            echo "
                            <br>
                                <img src='IMG/$row->zdjecie' alt='Obraz produktu'>
                                <h1>Nazwa</h1>
                                <span>$row->nazwa</span>
                                <h1>Cena</h1>
                                <span>$row->cena</span>
                                <h1>Kategoria</h1>
                                <span>
                            ";
                            $query2="SELECT * FROM `kategoria` WHERE `id_kategoria`=$row->id_kategoria";
                            $res2=$connect->query($query2);
                            while($row2=$res2->fetch_object())
                            {
                                echo "$row2->nazwa";
                            }
                            echo "
                            <h1>Opis</h1>
                            <span>$row->opis</span>
                            <h1>Dostępna Ilość</h1>
                            <span>$row->ilosc</span>
                            <br>
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