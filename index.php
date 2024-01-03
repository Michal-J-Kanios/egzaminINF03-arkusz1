<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="header">
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </div>
<section id="skibidi">
    <div id = "lewy">
        <h2>Taniej o 30%</h2>
        <ol>
            <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "sklep");
            $wyniki = mysqli_query($polaczenie, "SELECT nazwa FROM `towary` WHERE promocja = 1");
            while($r = mysqli_fetch_row($wyniki)) {
                echo "<li>";
                echo $r[0];
                echo "</li>";
            }
            mysqli_close($polaczenie);
            //tu bedzie skrypt 1
            ?>
        </ol>
    </div>

    <div id = "srodek">
        <h2>Sprawdź cenę</h2>
        <form action="" method="post">
            <select name="nazwa">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <button type="submit">SPRAWDŹ</button>
        </form>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "sklep");
        
        $nazwa = $_POST['nazwa'];
        $zapytanie2 = "SELECT `cena` FROM `towary` WHERE `nazwa` LIKE '$nazwa' ";
        $wyniki2 = mysqli_query($polaczenie, $zapytanie2);
        while($i = mysqli_fetch_row($wyniki2)) {
            $promocja = $i[0]*0.7;
            echo "<div class='wynik'>
            cena regularna: $i[0]<br />
            cena w promocji 30%: $promocja
        </div>";
            
        }

        mysqli_close($polaczenie);
        //echo "tu bedzie skrypt 2";
        ?>
    </div>

    <div id = "prawy">
        <h2>Kontakt</h2>
        <p>
            <a href="mailto:bok@sklep.pl">bok@sklep.pl</a>
        </p>
        <img src="promocja.png" alt="promocja">
    </div>
</section>

    <div id ="footer">Stronę wykonał: 000000000000</div>
</body>
</html>