<?php
session_start();
include "connect.php";
mysql_connect("$host", "$db_user", "$db_password");
mysql_select_db("$db_name");
$log = $_SESSION['login'];
mysql_query("DELETE FROM uzytkownicy WHERE login='$log'")
        or die('Błąd zapytania: ' . mysql_error());
session_unset();
header('Location: index.php');
?>