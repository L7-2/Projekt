<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$log=$_SESSION['login'];

mysql_query("UPDATE uzytkownicy SET Imie = '$imie', Nazwisko = '$nazwisko' WHERE login='$log'");
      
	header('Location: menu.php');
?>
