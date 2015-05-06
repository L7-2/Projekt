<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
</head>

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
		
		for ($i = 1; $i <= 10; $i++) {
			if(isset($_POST["mytext_{$i}"])){
				$_POST["mytext_{$i}"] = htmlentities($_POST["mytext_{$i}"], ENT_QUOTES, "UTF-8");
				$_POST["mytext_{$i}"] = mysqli_real_escape_string($polaczenie, $_POST["mytext_{$i}"]); 
				$tresc = $_POST["mytext_{$i}"];
				
				
				//ABY DZIALALO MUSIMY ODCZYTAĆ ZMIENNE SESYJNE !!
				if(isset($_SESSION['id'] ) && isset($_SESSION['idAnkiety'])){
				//Przypisuje zmienne sesyjne aby skorzystac z nich w zapytaniu SQL i wprowadzic je do bazy
					$idUzytkownika = $_SESSION['id'] ;
					$idAnkiety = $_SESSION['idAnkiety'];
					
					//Wprowadzam dane do bazy
					$sql = "INSERT INTO `pytania` (`Tresc`, `Ankiety_idAnkiety`, `Ankiety_Uzytkownicy_idUsers`) 
					VALUES ('{$tresc}', '{$idAnkiety}','{$idUzytkownika}')";   		
					
					if (!mysqli_query($polaczenie,$sql)) {
						die('Error: ' . mysqli_error($polaczenie));
						} else {
									echo "<h1><center>Pytania zostały poprawnie dodane  do ankiety<center><h1>";} 
								}
					
					
				}else {echo "Nie jesteś zalogowany";
				
					header('Refresh: 3;url=index.php');  //po 3 sekundach przekierowuje nas do strony glownej
					break;
					  
					 }
					  
			}
		}
	

     
   

        $polaczenie->close();
    
?>
