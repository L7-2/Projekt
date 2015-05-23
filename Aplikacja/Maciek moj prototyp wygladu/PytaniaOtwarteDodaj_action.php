<html lang="pl">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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
	
	
	$wrong = 0;  //do poprawnego wyswietlania komunikatu
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
		//ABY DZIALALO MUSIMY ODCZYTAĆ ZMIENNE SESYJNE !!
		if(isset($_SESSION['id'] ) && isset($_SESSION['idAnkiety'])){
			//Przypisuje zmienne sesyjne aby skorzystac z nich w zapytaniu SQL i wprowadzic je do bazy
			//$idUzytkownika = $_SESSION['id'] ;
			$idAnkiety = $_SESSION['idAnkiety'];
					
			$i = 0;  //inicjuje zmienna wartoscia od ktorej zaczynam pytania
			while(isset($_POST['mytext'][$i])){
				$_POST['mytext'][$i] = htmlentities($_POST['mytext'][$i], ENT_QUOTES, "UTF-8");
				$_POST['mytext'][$i] = mysqli_real_escape_string($polaczenie, $_POST['mytext'][$i]); 
				$tresc = $_POST['mytext'][$i];
			
				$i++;  //inkrementacja zmiennej aby przjesc do kolejnego pytania
				
					//Wprowadzam dane do bazy
					$sql = "INSERT INTO `pytania` (`Tresc`, `Ankiety_idAnkiety`) 
					VALUES ('{$tresc}', '{$idAnkiety}')";   		

					if (!mysqli_query($polaczenie,$sql)) {
						die('Error: ' . mysqli_error($polaczenie));
						} 
								
					}
							
			}
			else {
							$wrong =1;
							echo '<center><div class="alert alert-danger" role="alert">Nie jesteś zalogowany</div><center>';
							header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
							break;
							}
							
			if($wrong == 0)
			echo '<center><div class="alert alert-success" role="alert">Pytania zostały poprawnie dodane do ankiety</div><center>';
			header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
	}
	

     
   

        $polaczenie->close();
    
?>
</html>