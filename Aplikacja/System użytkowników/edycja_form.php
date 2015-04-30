<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");
if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
{
}else header('Location: index.php');
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
		<center><img src="obrazki/ankieta.png" width="1000" height="200" /></center>
		</div>
		<div id = menu>
			<a href="index.php">
			<div class="option">Strona główna</div></a>
			<div class="option">Kontakt</div>
			<div style="clear:both;"></div>
			</div>
		<div id="topbar">
			<div id="topbarL">
				<img src="obrazki/zdj.png" width="150" height="124"/>
			</div>
			<div id="topbarR">
				<span class="bigtitle">Ankiety Online</span>
				<div style="height: 15px;"></div>
				Serwis ankietyprz.pl został stworzony, aby w prosty sposób tworzyć ankiety internetowe o zaawansowanej funkcjonalności oraz zbierać, analizować i eksportować wyniki zebrane od respondentów. 
				Zapraszamy do testowania konta demo i założenia własnego konta, które oferujemy za darmo. 
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="sidebar">
			<div class="optionL" style="color: #000000">Dodaj Ankietę</div>
			<div class="optionL" style="color: #000000">Usuń Ankietę</div>
			<div class="optionL" style="color: #000000">Edytuj Ankietę</div>
			<a href="edycja_form.php">
			<div class="optionL" style="color: #000000">Edytuj Dane</div></a>
			<div class="optionL" style="color: #000000">Zaproszenia</div>
			<div class="optionL" style="color: #000000">Wiadomości</div>
		</div>
		
		<div id="content">
			<span class="bigtitle">Menu</span>
			
			<div class="dottedline"></div>
				
				<form method="POST" action="edycja.php">
                 Imie: <br/> <input type="text" name="imie"/><br/><br/>
                 Nazwisko: <br/> <input type="text" name="nazwisko"/><br/><br/>
                 Płeć:
                 <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="female");?>
                    value="0">Kobieta
                    <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="male");?>
                    value="1">Mężczyzna
                 <br/><br/>
                 Data urodzenia (0000-00-00): <br/> <input name="data_ur" type="date"<br/><br/><br/>
                 Miejsce zamieszkania: <br/> <input type="text" name="miejsce_zam"/><br/><br/>
                 Hasło: <br/> <input type="password" name="haslo"/><br/>
                 <input type="submit" value="Zmień dane">   
                 <br/>
                 <?php
                 if(isset($_SESSION['blad_dane'])){ echo $_SESSION['blad_dane'];
                unset($_SESSION['blad_dane']);}
                ?>
				</form>
			
			</div>	
		
		<div id="footer">
			Najlepszy darmowy serwis z ankietami
		</div>
	</div>
        </body>
</html>