<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8"/>
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
				<?php
	echo "<p>Witaj ".$_SESSION['login'].'![<a href="wyloguj.php">Wyloguj się!</a>]</p>';
	?>
        <form action="usuwanie.php">
         <input type="submit" value="Usuń Konto">
        </form>
            <br/>
            <form action="edycja_form.php">
         <input type="submit" value="Edytuj Konto">
        </form>
			</div>	
		
		<div id="footer">
			Najlepszy darmowy serwis z ankietami
		</div>
	</div>
	</body>
</html>