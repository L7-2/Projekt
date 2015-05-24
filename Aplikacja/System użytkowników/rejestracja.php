<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");
 
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
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $plec=$_POST['plec'];
        $data_ur=$_POST['data_ur'];
        $wojewodztwo=$_POST['wojewodztwo'];
        $haslo=$_POST['haslo'];
        $log=$_SESSION['login'];
	// sprawdzamy czy login nie jest już w bazie
	if (mysql_num_rows(mysql_query("SELECT Login FROM uzytkownicy WHERE Login = '".$login."';")) == 0)
        {
		if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
                    {
                    
                    if ($imie!=null && $nazwisko!=null && $plec!=null && $data_ur!=null && $wojewodztwo!=null && $haslo!=null && $login!=null && $email!=null)
                    {
                    mysql_query("INSERT INTO `uzytkownicy` (`Login`, `Haslo`, `Adres_email`, `Data_zalozenia_konta`)
                                                    VALUES ('".$login."', '".($haslo1)."', '".$email."', '".date("Y-m-d")."');");
                    mysql_query("UPDATE uzytkownicy SET Imie = '$imie', Nazwisko = '$nazwisko', "
                            . "Plec='$plec', Data_urodzenia='$data_ur', Wojewodztwo='$wojewodztwo' WHERE login='$login'");

                    $_SESSION['zarejestrowany']='<span style="color:red">Konto zostało utworzone!</span>';
                    header('Location: index.php');
                    }
                    else
                    {
                        $_SESSION['blad_dane']='<span style="color:red">Pola nie mogą pozostać puste!</span>';
                        header('Location: rejestracja_form.php');
                    }    
		}
		else
		{
			$_SESSION['zlehaslo']='<span style="color:red">Hasła nie są takie same</span>';
			header('Location: rejestracja_form.php');
		}
	}
	else 
		{
			$_SESSION['zajetylogin']='<span style="color:red">Podany login jest już zajęty.</span>';
			header('Location: rejestracja_form.php');
		}
}
?>