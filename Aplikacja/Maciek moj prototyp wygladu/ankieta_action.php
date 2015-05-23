<?php 
	
	function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}
	header('Content-Type: text/html; charset=utf-8'); 

	
	
	session_start();
	
	//$_SESSION['id'] = 1;  uzywane do testowania
    include "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
    if($polaczenie->connect_errno!=0) // jeśli nie uda się połączyć z bazą
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
		mysql_query('SET NAME utf8');
		mysql_query("SET CHARACTER SET 'utf8'");
		
			if(isset($_POST['submit'])){
			$_POST["tytulAnkiety"] = htmlentities($_POST["tytulAnkiety"], ENT_QUOTES, "UTF-8");
			$_POST["tytulAnkiety"] = mysqli_real_escape_string($polaczenie, $_POST["tytulAnkiety"]); 
			$tytulAnkiety = $_POST["tytulAnkiety"] ;
			
			$_POST["opisAnkietyy"] = htmlentities($_POST["opisAnkiety"], ENT_QUOTES, "UTF-8");
			$_POST["opisAnkiety"] = mysqli_real_escape_string($polaczenie, $_POST["opisAnkiety"]); 
			$opisAnkiety = $_POST["opisAnkiety"] ;
			
			$Anonimowosc = $_POST["Anonimowosc"] ;
			
			if(isset($_SESSION['id'] ) && $Anonimowosc=="0")
			{
				$id = $_SESSION['id'];
				$sql = "INSERT INTO `Ankiety` (`Tytul`, `Opis`, `Anonimowosc`, `Uzytkownicy_idUsers`) 
						VALUES ('{$tytulAnkiety}', '{$opisAnkiety}','{$Anonimowosc}','{$id}')";  
				}
				
	
				if (!mysqli_query($polaczenie,$sql)) {
				die('Error: ' . mysqli_error($polaczenie));
				}else {
				echo "<center>Ankieta dodana poprawnie<center>";
				header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
				}
				
				}
		
		}
?>