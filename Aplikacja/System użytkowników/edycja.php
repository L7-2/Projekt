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
            <form method="POST" action="edycja_form.php">
                 Imie: <br/> <input type="text" name="imie"/><br/>
                 Nazwisko: <br/> <input type="text" name="nazwisko"/><br/>
                 <input type="submit" value="Zmień">
            </form>
        </body>
</html>