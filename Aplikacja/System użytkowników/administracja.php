<?php

require_once 'mail.php';
include "connect.php";
function select(&$zap) {
	include "connect.php";
    $link = mysql_connect("$host", "$db_user", "$db_password");
			mysql_select_db("$db_name");
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
 
    $result = mysql_query($zap);
	
    $tabela='<table border="1">';
    $tabela=$tabela.'<tr><th>ID</th><th>Login</th><th>Hasło</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th>'
    . '<th>Data urodzenia</th><th>Województwo</th><th>Adres eMail</th><th>Data zał. konta</th><th>Wyp. ankiety</th><th>Zam. ankiety</th>'
    . '<th>Admin</th><th>Zab.</th></tr>';
    while ($row = mysql_fetch_row($result)) {
        $tabela=$tabela. '<tr>';
        foreach ($row as $value) {
            $tabela=$tabela. '<td>' . $value . '</td>';
        }
        $tabela=$tabela. '</tr>';
    }
    $tabela=$tabela. '</table>';
    mysql_free_result($result);

    mysql_close($link);
	return $tabela;
}
$html = file_get_contents("gui.xhtml");
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$log = $_SESSION['login'];
$link = mysql_connect("$host", "$db_user", "$db_password");
			mysql_select_db("$db_name");
			if (!$link) {
			die('Could not connect: ' . mysql_error());
			}
			$zapytanie = mysql_query("Select administrator From uzytkownicy where login='$log'");
			if(mysql_num_rows($zapytanie)){
			$row = mysql_fetch_row($zapytanie);
			foreach ($row as $value) {
            $admin=$value;
			}
        }
		if(!$admin){
			exit();
		}
		$search=':admin:';
	$replace='<a href="usuwanie.php"><div class="optionL" style="color: #000000">Administracja</div></a>';
    $html=str_replace($search,$replace,$html);

			
if (isset($_REQUEST['Wybierz'])) {
    $id = $_POST['id'];
    if($id!=''){
     
    
    $zapytanie = mysql_query("Select Login From uzytkownicy where idUsers='$id'");
    if(mysql_num_rows($zapytanie)){
    $row = mysql_fetch_row($zapytanie);
    foreach ($row as $value) {
            $replace=$value;
        }
    $search=":Login:";
    $html=str_replace($search,$replace,$html);
    $zapytanie = mysql_query("Select Haslo From uzytkownicy where idUsers='$id'");
    $row = mysql_fetch_row($zapytanie);
    foreach ($row as $value) {
            $replace=$value;
        }
    $search=":Haslo:";
    $html=str_replace($search,$replace,$html);
    }
    $replace='name="id" value="'.$id.'"';
    $search='name="id"';
    $html=str_replace($search,$replace,$html);
    }
	$search='id="edit" style="visibility:hidden"';
	$replace='id="edit" style="visibility:visible"';
    $html=str_replace($search,$replace,$html);
   
}


if (isset($_REQUEST['Edytuj'])) { 
    $id = $_POST['id'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    mysql_query("UPDATE uzytkownicy SET Login = '$login' WHERE idUsers='$id'");
    mysql_query("UPDATE uzytkownicy SET Haslo = '$haslo' WHERE idUsers='$id'");
}
if (isset($_REQUEST['Usun'])) { 
    $id = $_POST['id'];
    mysql_query("DELETE FROM uzytkownicy WHERE idUsers='$id'") ;
}
if (isset($_REQUEST['Blokuj'])) { 
	
    $id = $_POST['id'];
	$zapytanie = mysql_query("Select Zablokowany From uzytkownicy where idUsers='$id'");
	if(mysql_num_rows($zapytanie)){
    $row = mysql_fetch_row($zapytanie);
    foreach ($row as $value) {
            $zap=$value;
        }
	}
    if($zap) mysql_query("UPDATE uzytkownicy SET Zablokowany = 0 WHERE idUsers='$id'");
	else mysql_query("UPDATE uzytkownicy SET Zablokowany = 1 WHERE idUsers='$id'");
}
if (isset($_REQUEST['Wyswietl'])) { //2
    $plec = $_POST['plec'];
    $woj = $_POST['woj'];
    $data = $_POST['Data'];
    $data2 = $_POST['Data2'];
    $wynik = "SELECT * from uzytkownicy where Plec like '$plec%' and Wojewodztwo like '$woj%'";

    if (isset($_POST['Data_od'])) {
        $wynik = $wynik . " and data_urodzenia>=CAST('$data' as DATETIME)";
    }
    if (isset($_POST['Data_do'])) {
        $wynik = $wynik . " and data_urodzenia<=CAST('$data2' as DATETIME)";
    }

    $tabela=select($wynik);
	$search='id="tabela">';
	$replace='id="tabela">'.$tabela;
    $html=str_replace($search,$replace,$html);
}
echo $html;
if (isset($_REQUEST['Wyslij'])) { //2
    $temat = $_POST['Temat'];
    $wiad = $_POST['wiad'];
    $zapytanie = mysql_query("Select adres_email From uzytkownicy");
    while ($row = mysql_fetch_row($zapytanie)) {
        foreach ($row as $value) {
            smtp_mail($value, $temat, $wiad);
        }
    }
    
}
?>