<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<!-- Bootstrap -->
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
	
	//$_SESSION['id'] = null;
	//$_SESSION['idAnkiety'] = 5;
	$maksymalnaLiczbaPytan = 30;
	$wrong = 0;
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
		
		
		
		
		
			
		
		//Dodawanie tresci pytania zamknietego
		if(isset($_SESSION['id'] ) && isset($_SESSION['idAnkiety']) ){
			//sprawdza czy uzytkownik jest zalogowany tzn czy ma jakies id i czy zaczal tworzyc ankiete, bo bez tego nie moze stworzyc pytan
				//	$idUzytkownika = $_SESSION['id'] ;
					$idAnkiety = $_SESSION['idAnkiety'];
					
					
					
					//Uzytkownik musi wpisac tresc pytania, aby pdoac do neigo jakies odpowiedzi
					if(isset($_POST["trescZamkniete"] )){
						$_POST["trescZamkniete"] = htmlentities($_POST["trescZamkniete"], ENT_QUOTES, "UTF-8");
						$_POST["trescZamkniete"] = mysqli_real_escape_string($polaczenie, $_POST["trescZamkniete"]); 
						$tresc = $_POST["trescZamkniete"] ;

					//	echo "tresc pytania:{$tresc}";
						$sql = "INSERT INTO `pytania` (`Tresc`, `Ankiety_idAnkiety`) 
						VALUES ('{$tresc}', '{$idAnkiety}')";   
						
						if (!mysqli_query($polaczenie,$sql)) {
						die('Error: ' . mysqli_error($polaczenie));
						} else {	
								//Odczytanie idPytania tej samej ankiety i o tej samej tresci
								
								
								$query = "SELECT idPytania from pytania 
								where Tresc = '{$tresc}' 
								AND Ankiety_idAnkiety = '{$idAnkiety}' ";

							if ($result = mysqli_query($polaczenie, $query)) {
								$row = mysqli_fetch_assoc($result);
								$Pytania_idPytania = $row["idPytania"] ;
								}
							
									
									
									
									
									$i = 0;
										while(isset($_POST["odp"][$i])){
											$_POST["odp"][$i]= htmlentities($_POST["odp"][$i], ENT_QUOTES, "UTF-8");
											$_POST["odp"][$i] = mysqli_real_escape_string($polaczenie, $_POST["odp"][$i]); 
											$odp = $_POST["odp"][$i];
										
											$i++;
									
											$sql2= "INSERT INTO `odp_zamknieta` (`Tresc`, `Pytania_idPytania`) 
											VALUES ('{$odp}', '{$Pytania_idPytania}')";   
								
											if (!mysqli_query($polaczenie,$sql2)) {
												die('Error: ' . mysqli_error($polaczenie));
											} else {
													
													
													} 
												}
									   
									}
								}

							}
							else{
							$wrong =1;
									echo '<center><div class="alert alert-danger" role="alert">Nie jesteś zalogowany</div><center>';
									header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
									
							}
							
							if($wrong == 0)
							echo '<center><div class="alert alert-success" role="alert">Pytania zostały poprawnie dodane do ankiety</div><center>';
							header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
						}
        $polaczenie->close();
		
    
?>
</html>