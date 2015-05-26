<?php
session_start();
if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true)) {
    header('Location: menu.php');
    exit();
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ankiety Online</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
        <div id = container>
            <div id = logo>
                <center><img src="obrazki/tlo.jpg" width="1000" height="140" /></center>
            </div>
            <div id = menu>
                <a href="index.php">
                    <div class="option">Strona główna</div></a>
                <a href="rejestracja_form.php">
                    <div class="option">Zarejestruj się</div></a>
                <a href="kontakt.php">
                    <div class="option">Kontakt</div></a>
                <div id = "uzytkownik">
                    <!-- Utworzenie formularza logowania -->
                    <form action="logowanie.php" method="post">
                        Login: <input type="text" name="login"/>
                        &nbsp;&nbsp;&nbsp;Hasło: <input type="password" name="haslo"/>
                        &nbsp;&nbsp;<input type="submit" value="Zaloguj się"/>
                    </form>
                    <?php
                    if (isset($_SESSION['blad'])) {
                        echo $_SESSION['blad'];
                        unset($_SESSION['blad']);
                    }
                    if (isset($_SESSION['zablokowany'])) {
                        echo $_SESSION['zablokowany'];
                        unset($_SESSION['zablokowany']);
                    }
                    ?>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div id="topbar">
                <div id="topbarL">
                    <img src="obrazki/zdj.png" width="150" height="124"/>
                </div>
                <div id="topbarR">
                    <center><span class="bigtitle">Twórz i analizuj za darmo swoje ankiety online!</span></center>
                       </div>
                <div style="clear:both;"></div>
            </div>
            <div id="sidebar">
            </div>
            <div id="content">
                <center> <img src="obrazki/dlaczego.png" width="400" height="142"/></center> 
              <br/>  1. Każdy użytkownik może bezpłatnie stworzyć ankietę.<br/>
                2. Utworzoną ankietę może wysłać do konkretnej osoby lub puli wybranych osób poprzez adres e-mail.<br/>
                3. Ankiety zawierają zarówno pytania otwarte, jak i zamknięte.<br/>
                4. Każdy z uczestików posiada możliwość sprawdzenia i przeglądnięcia wyników swoich ankiet.<br/>
                <?php
                if (isset($_SESSION['zarejestrowany'])) {
                    echo $_SESSION['zarejestrowany'];
                    unset($_SESSION['zarejestrowany']);
                }
                ?>
            </div>	
            <div id="footer">
              II EF-DI, grupa: L7-2</br>Politechnika Rzeszowska 2015r.
            </div>
        </div>

    </body>
</html>