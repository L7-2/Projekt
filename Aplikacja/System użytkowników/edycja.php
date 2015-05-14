<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$plec=$_POST['plec'];
$data_ur=$_POST['data_ur'];
$wojewodztwo=$_POST['wojewodztwo'];
$haslo=$_POST['haslo'];
$log=$_SESSION['login'];
if ($imie!=null && $nazwisko!=null && $plec!=null && $data_ur!=null && $wojewodztwo!=null && haslo!=null){
mysql_query("UPDATE uzytkownicy SET Imie = '$imie', Nazwisko = '$nazwisko', "
        . "Plec='$plec', Data_urodzenia='$data_ur', Wojewodztwo='$wojewodztwo', Haslo='$haslo' WHERE login='$log'");
      
header('Location: menu.php');}
else
{
    $_SESSION['blad_dane']='<span style="color:red">Pola nie mogą pozostać puste!</span>';
    header('Location: rejestracja_form.php');
}
?>
