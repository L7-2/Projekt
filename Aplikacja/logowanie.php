<?php
    require_once "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie po³¹czenia z baz¹
    if($polaczenie->connect_errno!=0) // je¿eli nie uda siê po³¹czyæ z baz¹
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        
        $sql = "SELECT * FROM users WHERE login='$login' AND haslo='$haslo'"; // wybranie loginu i has³a z bazy danych
        if($wynikpolaczania = @$polaczenie->query($sql)) // sprawdzenie czy zapytanie jest dobrze zapisane
        {
            $uzytkownicy = $wynikpolaczania->num_rows; // zwrocenie ile uzytkownikow ma podany login i haslo
            if($uzytkownicy>0) // jezeli udalo sie zalogowac i login i haslo znajduje sie w bazie danych
            {
                $wiersz = $wynikpolaczania->fetch_assoc();
                $login = $wiersz['login']; // pobrania wartosci z kolumny login
                echo "Witaj, twoj login to: ".$login;
                $wynikpolaczania->close();
                
            }else{
                
            }
        }
        
        $polaczenie->close();
    }   
?>

