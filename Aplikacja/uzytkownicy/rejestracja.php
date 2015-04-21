<?php
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
 
function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}
 
if (isset($_POST['rejestruj']))
{
	$login = filtruj($_POST['login']);
	$haslo1 = filtruj($_POST['haslo1']);
	$haslo2 = filtruj($_POST['haslo2']);
	$email = filtruj($_POST['email']);
	 
	// sprawdzamy czy login nie jest już w bazie
	if (mysql_num_rows(mysql_query("SELECT Login FROM Uzytkownicy WHERE Login = '".$login."';")) == 0)
	{
		if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
		{
			mysql_query("INSERT INTO `Uzytkownicy` (`Login`, `Haslo`, `Adres_email`, `Data_zalozenia_konta`)
				VALUES ('".$login."', '".($haslo1)."', '".$email."', '".time()."');");
 
			echo "Konto zostało utworzone!";
		}
		else echo "Hasła nie są takie same";
	}
	else echo "Podany login jest już zajęty.";
}
?>