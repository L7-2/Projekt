<?php
session_start();
if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
{
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
	<div id = pojemnik>
		<div id = logo>
		<img src="obrazki/ankieta.png" width="897" height="179" />
		</div>
		<div id = menu>
		asdasdasd
		</div>
		<div id = tresc>
			Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
		</div>
		<div id = uzytkownik>
			<!-- Utworzenie formularza logowania -->
            <form action="logowanie.php" method="post">
                Login: <br/> <input type="text" name="login"/><br/>
                Hasło: <br/> <input type="password" name="haslo"/><br/>
                <input type="submit" value="Zaloguj się"/>
            </form>
            <form action="rejestracja_form.php">
            <input type="submit" value="Utwórz konto" name="rejestruj">
            </form>
			<?php
			if(isset($_SESSION['blad'])){ echo $_SESSION['blad'];
			unset($_SESSION['blad']);}
			if(isset($_SESSION['zablokowany'])) {echo $_SESSION['zablokowany'];
			unset($_SESSION['zablokowany']);}
			?>
		</div>
		<div id = stopka>
			<div id = tekst>
			Ankiety On-Line
			</div>
		</div>
		
	</div>
	</body>
</html>