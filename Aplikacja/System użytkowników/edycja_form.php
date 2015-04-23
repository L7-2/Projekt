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
            <form method="POST" action="edycja.php">
                 Imie: <br/> <input type="text" name="imie"/><br/>
                 Nazwisko: <br/> <input type="text" name="nazwisko"/><br/>
                 Płeć: <br/> 
                 <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="female");?>
                    value="0">Kobieta
                    <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="male");?>
                    value="1">Mężczyzna
                 <br/>
                 Data urodzenia (0000-00-00): <br/> <input name="data_ur" type="date"<br/><br/>
                 Miejsce zamieszkania: <br/> <input type="text" name="miejsce_zam"/><br/>
                 <input type="submit" value="Zmień">                
            </form>
        </body>
</html>