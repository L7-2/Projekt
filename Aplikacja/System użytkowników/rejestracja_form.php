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
		<div id = pojemnik>
		<div id = logo>
		<img src="obrazki/ankieta.png" width="897" height="179" />
		</div>
		<div id = menu>
		sdad
		</div>
		<div id = tresc>
			Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
		</div>
		<div id = uzytkownik>
                <form method="POST" action="rejestracja.php">
                <b>Login:</b> <input type="text" name="login"><br>
                <b>Hasło:</b> <input type="password" name="haslo1"><br>
                <b>Powtórz hasło:</b> <input type="password" name="haslo2"><br>
                <b>Email:</b> <input type="text" name="email"><br>
                <input type="submit" value="Utwórz konto" name="rejestruj">
                </form>
		</div>
		<div id = stopka>
			<div id = tekst>
			Ankiety On-Line
			</div>
		</div>
		
	</div>

        </body>
</html>