<?php

session_start();
include "connect.php";
mysql_connect("$host", "$db_user", "$db_password");
mysql_select_db("$db_name");
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$plec = $_POST['plec'];
$data_ur = $_POST['data_ur'];
$wojewodztwo = $_POST['wojewodztwo'];
$haslo = $_POST['haslo'];
$haslo2 = $_POST['haslo2'];
$log = $_SESSION['login'];
if ($haslo == $haslo2) {
    if ($imie != null)
        mysql_query("UPDATE uzytkownicy SET Imie = '$imie' WHERE login='$log'");
    else {
        
    };
    if ($nazwisko != null)
        mysql_query("UPDATE uzytkownicy SET Nazwisko = '$nazwisko' WHERE login='$log'");
    else {
        
    };
    if ($plec != null)
        mysql_query("UPDATE uzytkownicy SET Plec = '$plec' WHERE login='$log'");
    else {
        
    };
    if ($data_ur != null)
        mysql_query("UPDATE uzytkownicy SET Data_urodzenia = '$data_ur' WHERE login='$log'");
    else {
        
    };
    if ($wojewodztwo != null)
        mysql_query("UPDATE uzytkownicy SET Wojewodztwo = '$wojewodztwo' WHERE login='$log'");
    else {
        
    };
    if ($haslo != null)
        mysql_query("UPDATE uzytkownicy SET Haslo = '$haslo' WHERE login='$log'");
    else {
        
    };
    header('Location: menu.php');
} else {
    $_SESSION['blad_dane'] = '<span style="color:red">Hasła nie są takie same!</span>';
    header('Location: edycja_form.php');
}
?>
