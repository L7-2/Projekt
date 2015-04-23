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
	</head>
        <body>
                <form method="POST" action="rejestracja.php">
                <b>Login:</b> <input type="text" name="login"><br><br>
                <b>Hasło:</b> <input type="password" name="haslo1"><br>
                <b>Powtórz hasło:</b> <input type="password" name="haslo2"><br><br>
                <b>Email:</b> <input type="text" name="email"><br>
                <input type="submit" value="Utwórz konto" name="rejestruj">
                </form>
        </body>
</html>