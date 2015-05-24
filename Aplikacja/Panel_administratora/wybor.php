<?php

require_once 'mail.php';

function select(&$zap) {
    $link = mysql_connect('localhost', 'mydbusr', 'test123');
    mysql_select_db("mydb");
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
 
    $result = mysql_query($zap);

    echo '<div id="dziecko3">';
    echo '<table border="2">';
    echo "<tr><th>ID</th><th>Login</th><th>Hasło</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th>"
    . "<th>Data urodzenia</th><th>Województwo</th><th>Adres eMail</th><th>Data założenia konta</th><th>Wypełnione ankiety</th><th>Zamieszczone ankiety</th>"
    . "<th>Administrator</th><th>Ankietowany</th><th>Ankietujący</th><th>Zablokowany</th></tr>";
    while ($row = mysql_fetch_row($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo '</div>';
    mysql_free_result($result);

    mysql_close($link);
}
$link = mysql_connect('localhost', 'mydbusr', 'test123');
    mysql_select_db("mydb");
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
$nag = file_get_contents("nag.xhtml");
$html = file_get_contents("gui.xhtml");
echo $nag;

if (isset($_REQUEST['Wybierz'])) {
    $id = $_POST['id'];
    if($id!=''){
    echo " #edit {
        visibility: visible;
}";
     
    
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
    }else{
    echo " #edit {
     visibility: hidden;
    }";
    }
}
else{
    echo " #edit {
  visibility: hidden;
}";
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
echo $html;
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

    select($wynik);
  
}

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

echo " </div></form></body> </html>";
?>