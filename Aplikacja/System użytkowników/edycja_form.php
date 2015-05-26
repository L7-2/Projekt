<?php
session_start();
include "connect.php";
mysql_connect("$host", "$db_user", "$db_password");
mysql_select_db("$db_name");
if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true)) {
    
} else
    header('Location: index.php');
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
                <a href="kontakt.php">
                    <div class="option">Kontakt</div></a>
                <a href="wyloguj.php">
                    <div class="option">Wyloguj się</div></a>
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
                <div class="optionL" style="color: #000000">Dodaj ankietę</div>
                 <div class="optionL" style="color: #000000">Edytuj ankietę</div>
                  <div class="optionL" style="color: #000000">Usuń ankietę</div>
                 <div class="optionL" style="color: #000000">Zaproszenia</div>
                <div class="optionL" style="color: #000000">Wiadomości</div>
                <a href="edycja_form.php">
                 <div class="optionL" style="color: #000000">Edytuj dane</div></a>
                  <a href="usuwanie.php">
                    <div class="optionL" style="color: #000000">Usuń konto</div></a>
            </div>
            <div id="content">
                <span class="bigtitle2">Edycja danych</span>
                <div class="dottedline"></div>
                <form method="POST" action="edycja.php">
                   <b> Imię:</b> <br/> <input type="text" name="imie"/><br/><br/>
                   <b>  Nazwisko</b>  <br/> <input type="text" name="nazwisko"/><br/><br/>
                    <b> Płeć:</b> <br/>
                    <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec == "female") ; ?>
                           value="0">Kobieta
                    <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec == "male") ; ?>
                           value="1">Mężczyzna
                    <br/><br/>
                    <b> Data urodzenia (0000-00-00):</b>  <br/> <input name="data_ur" type="date"<br/><br/>
                    <p><b> Województwo:</b> <br>
                        <select name="wojewodztwo">
                            <option value="dolnoslaskie" selected>dolnośląskie</option>
                            <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                            <option value="lubelskie">lubelskie</option>
                            <option value="lubuskie">lubuskie</option>
                            <option value="lodzkie">łódzkie</option>
                            <option value="malopolskie">małopolskie</option>
                            <option value="mazowieckie">mazowieckie</option>
                            <option value="opolskie">opolskie</option>
                            <option value="podkarpackie">podkarpackie</option>
                            <option value="podlaskie">podlaskie</option>
                            <option value="pomorskie">pomorskie</option>
                            <option value="slaskie">śląskie</option>
                            <option value="swietokrzyskie">świętokrzyskie</option>
                            <option value="warminsko-mazurskie">warmińsko-mazurskie</option>
                            <option value="wielkopolskie">wielkopolskie</option>
                            <option value="zachodniopomorskie">zachodniopomorskie</option>
                        </select>
                    </p>
                   <b>  Hasło:</b>  <br/> <input type="password" name="haslo"/><br/><br/>
                    <b> Powtórz hasło:</b>  <br/> <input type="password" name="haslo2"/><br/>
                    <input type="submit" value="Zmień dane">   
                    <br/>
                    <?php
                    if (isset($_SESSION['blad_dane'])) {
                        echo $_SESSION['blad_dane'];
                        unset($_SESSION['blad_dane']);
                    }
                    ?>
                </form>
            </div>	
            <div id="footer">
               II EF-DI, grupa: L7-2</br>Politechnika Rzeszowska 2015r.
            </div>
        </div>
    </body>
</html>