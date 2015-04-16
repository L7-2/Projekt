<?php
session_start();


if((!isset($_POST['login']))||(!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}
    require_once "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
    if($polaczenie->connect_errno!=0) // jeśli nie uda się połączyć z bazą
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        
        $sql = "SELECT * FROM uzytkownicy WHERE Login='$login' AND Haslo='$haslo'"; // wybranie loginu i hasła z bazy danych
        if($wynikpolaczania = @$polaczenie->query($sql)) // sprawdzenie czy zapytanie jest dobrze zapisane
        {
            $uzytkownicy = $wynikpolaczania->num_rows; // zwrocenie ile uzytkownikow ma podany login i haslo
            if($uzytkownicy>0) // jezeli udalo sie zalogowac i login i haslo znajduje sie w bazie danych
            {
				$_SESSION['zalogowany']=true;
				
                $wiersz = $wynikpolaczania->fetch_assoc();
				$_SESSION['id']=$wiersz['idUsers'];
                $_SESSION['login'] = $wiersz['Login']; // pobrania wartosci z kolumny login
                
				
				unset($_SESSION['blad']);
				
				$wynikpolaczania->free_result();
                header('Location: menu.php');
            }else{
                $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
            }
        }
        
        $polaczenie->close();
    }   
?>

