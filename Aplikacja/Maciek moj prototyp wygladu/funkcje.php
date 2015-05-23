<?php

include "connect.php";
    
	
	function sprawdzLiczbePytan($maksLiczbaPytan){
	
	
		include "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
    if($polaczenie->connect_errno!=0) // jeśli nie uda się połączyć z bazą
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
	
		//$_SESSION['id'] = 1;
		//$_SESSION['idAnkiety'] = 10;
		
		
		if(isset($_SESSION['id']))  //sprawdzam czy uzytkownik jest zalogowany
		{	
			$IdUser = $_SESSION['id'];
			
			if($_SESSION['pytanie'] == 1 && isset($_SESSION['idAnkiety']) ){
			$IdAnkiety = $_SESSION['idAnkiety'];
			$zapytanie = "SELECT count(idPytania) as liczbaPytan from pytania 
									where Ankiety_idAnkiety = '{$IdAnkiety}' ";
									
									
			}else $zapytanie = "SELECT count(idAnkiety) as liczbaPytan from ankiety
				where Uzytkownicy_idUsers = {$IdUser} ";
			
								

			if ($wynik = mysqli_query($polaczenie, $zapytanie)  ) {
				$row = mysqli_fetch_assoc($wynik);
				$liczbaPytan = $row["liczbaPytan"] ;
				if($_SESSION['pytanie'] == 1)
				echo "<input type='hidden' id=liczbaPytan name=liczbaPytan value={$liczbaPytan} />";
									
				if($liczbaPytan > $maksLiczbaPytan){
					if($_SESSION['pytanie'] == 1){
					echo '<center><div class="alert alert-danger" role="alert">Masz już  ',$liczbaPytan,' pytań nie możesz dodać więcej</div><center>';
						header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
						exit;
					}else echo '<center><div class="alert alert-danger" role="alert">Masz już  ',$liczbaPytan,' ankiet nie możesz dodać więcej</div><center>';
					
					header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
					exit;
				}
				
			}
								
		}else  {
				echo '<center><div class="alert alert-danger" role="alert">Nie jesteś zalogowany</div><center>';
				header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
				exit;
			}				
								
	}

	}
	

?>
