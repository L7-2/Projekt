<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$plec=$_POST['plec'];
$data_ur=$_POST['data_ur'];
$miejsce_zam=$_POST['miejsce_zam'];
$log=$_SESSION['login'];

mysql_query("UPDATE uzytkownicy SET Imie = '$imie', Nazwisko = '$nazwisko', "
        . "Plec='$plec', Data_urodzenia='$data_ur', Miejsce_zamieszkania='$miejsce_zam' WHERE login='$log'");
      
	header('Location: menu.php');
?>
