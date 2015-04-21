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
	</head>
	<body>
            <!-- Utworzenie formularza logowania -->
            <form action="logowanie.php" method="post">
                Login: <br/> <input type="text" name="login"/><br/>
                Hasło: <br/> <input type="password" name="haslo"/><br/>
                <input type="submit" value="Zaloguj się"/>
            </form>
			
			<form method="POST" action="rejestracja.php">
			<b>Login:</b> <input type="text" name="login"><br><br>
			<b>Hasło:</b> <input type="password" name="haslo1"><br>
			<b>Powtórz hasło:</b> <input type="password" name="haslo2"><br><br>
			<b>Email:</b> <input type="text" name="email"><br>
			<input type="submit" value="Utwórz konto" name="rejestruj">
			</form>
			
<?php
if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
if(isset($_SESSION['zablokowany'])) echo $_SESSION['zablokowany'];
?>
	</body>
</html>