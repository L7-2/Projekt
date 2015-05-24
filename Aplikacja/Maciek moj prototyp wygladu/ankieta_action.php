     <html lang="pl">
      <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>
	 
	 <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

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
		if(isset($_SESSION['id'] ) ){
			if(isset($_POST['submit'])){
				//wstawiam tytul Ankiety, pobrany ze zmiennej wsylanej metoda POST
				$_POST["tytulAnkiety"] = htmlentities($_POST["tytulAnkiety"], ENT_QUOTES, "UTF-8");
				$_POST["tytulAnkiety"] = mysqli_real_escape_string($polaczenie, $_POST["tytulAnkiety"]); 
				$tytulAnkiety = $_POST["tytulAnkiety"] ;
				
				//wstawiam opis Ankiety, pobrany ze zmiennej wsylanej metoda POST
				$_POST["opisAnkietyy"] = htmlentities($_POST["opisAnkiety"], ENT_QUOTES, "UTF-8");
				$_POST["opisAnkiety"] = mysqli_real_escape_string($polaczenie, $_POST["opisAnkiety"]); 
				$opisAnkiety = $_POST["opisAnkiety"] ;
				
				$Anonimowosc = $_POST["Anonimowosc"] ;
				
				
					$id = $_SESSION['id'];
					$sql = "INSERT INTO `Ankiety` (`Tytul`, `Opis`, `Anonimowosc`, `Uzytkownicy_idUsers`) 
							VALUES ('{$tytulAnkiety}', '{$opisAnkiety}','{$Anonimowosc}','{$id}')";  
						
						if (!mysqli_query($polaczenie,$sql)) {
							die('Error: ' . mysqli_error($polaczenie));
						}else {
							echo '<center><div class="alert alert-success" role="alert">Ankieta dodana poprawnie</div><center>';
							header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
						}
			}
		}else{
			echo '<center><div class="alert alert-danger" role="alert">Nie jesteś zalogowany</div><center>';
						header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
		} 
				
				
		
	}
?>

</html