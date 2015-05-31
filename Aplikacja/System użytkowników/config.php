<?php
 
// definiujemy dane do po³¹czenia z baz¹ danych
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'mydb');
 
	
 
function db_connect() {
    // po³¹czenie z mysql
    mysql_connect(DBHOST, DBUSER, DBPASS) or die('<h2>ERROR</h2> MySQL Server is not responding');
 
    // wybór bazy danych
    mysql_select_db(DBNAME) or die('<h2>ERROR</h2> Cannot connect to specified database');
}
 
function db_close() {
    mysql_close();
}
 
function clear($text) {
    // jeœli serwer automatycznie dodaje slashe to je usuwamy
    if(get_magic_quotes_gpc()) {
        $text = stripslashes($text);
    }
    $text = trim($text); // usuwamy bia³e znaki na pocz¹tku i na koñcu
    $text = mysql_real_escape_string($text); // filtrujemy tekst aby zabezpieczyæ siê przed sql injection
    $text = htmlspecialchars($text); // dezaktywujemy kod html
    return $text;
}
 
function codepass($password) {
    // kodujemy has³o (losowe znaki mo¿na zmieniæ lub ca³kowicie usun¹æ
    return sha1(md5($password).'#!%Rgd64');
}
 
// funkcja na sprawdzanie czy user jest zalogowany, jeœli nie to wyœwietlamy komunikat
function check_login() {
    if(!$_SESSION['logged']) {
        die('<p>To jest strefa tylko dla u¿ytkowników.</p>
        <p>[<a href="login.php">Logowanie</a>] [<a href="zarejestruj.php">Zarejestruj siê</a>]</p>');
    }
}
 
// funkcja na pobranie danych usera
function get_user_data($user_id = -1) {
    // jeœli nie podamy id usera to podstawiamy id aktualnie zalogowanego
    if($user_id == -1) {
        $user_id = $_SESSION['user_id'];
    }
    $result = mysql_query("SELECT * FROM `users` WHERE `user_id` = '{$user_id}' LIMIT 1");
    if(mysql_num_rows($result) == 0) {
        return false;
    }
    return mysql_fetch_assoc($result);
}
 
// startujemy sesje
session_start();
 
// jeœli nie ma jeszcze sesji "logged" i "user_id" to wype³niamy je domyœlnymi danymi
if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
    $_SESSION['user_id'] = -1;
}
?>