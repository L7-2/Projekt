<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");
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
			<a href="rejestracja_form.php">
			<div class="option">Zarejestruj się</div></a>
			<div class="option">Kontakt</div>
			<div class="option">O serwisie</div>
			<div id = "uzytkownik">
			<!-- Utworzenie formularza logowania -->
            <form action="logowanie.php" method="post">
                Login: <input type="text" name="login"/>
                &nbsp;&nbsp;&nbsp;Hasło: <input type="password" name="haslo"/>
                &nbsp;&nbsp;<input type="submit" value="Zaloguj się"/>
            </form>
			<?php
			if(isset($_SESSION['blad'])){ echo $_SESSION['blad'];
			unset($_SESSION['blad']);}
			if(isset($_SESSION['zablokowany'])) {echo $_SESSION['zablokowany'];
			unset($_SESSION['zablokowany']);}
			?>
			</div>
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
			<a href="index.php">
			<div class="optionL" style="color: #000000">Strona główna</div></a>
			<div class="optionL" style="color: #000000">Ankiety</div>
			<div class="optionL" style="color: #000000">Edytuj dane</div>
		</div>
		
		<div id="content">
			<span class="bigtitle">Rejestracja</span>
			
			<div class="dottedline"></div>
				<div id = rejestruj style="margin-left: 5%;">
                <form method="POST" action="rejestracja.php">
                <b>Login:</b> <input type="text" name="login" style="margin-left: 9.3%;"><br>
                <b>Hasło:</b> <input type="password" name="haslo1" style="margin-left: 9.3%;"><br>
                <b>Powtórz hasło:</b> <input type="password" name="haslo2"><br>
                <b>Email:</b> <input type="text" name="email" style="margin-left: 9.5%;"><br>
                <input type="submit" value="Utwórz konto" name="rejestruj">
                </form>
				</div>
			</div>	
			</div>	
		
		<div id="footer">
			Najlepszy darmowy serwis z ankietami
		</div>
	</div>
        </body>
</html>