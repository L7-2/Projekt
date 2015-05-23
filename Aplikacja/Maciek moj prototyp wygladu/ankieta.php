<html lang="pl">
      <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	</head>
		<style type="text/css">
			#fixme { 
			margin-left: 40%;
			display:inline-block;
			vertical-align:top;
			position: absolute; 
			left: 0px; 
			top: 0px; 
		}
		#fixmetoo { 
			position: absolute; 
			right: 0px; 
			bottom: 0px; 
		}
		div > div#fixme { position: fixed; }
		div > div#fixmetoo { position: fixed; }
		
		pre.fixit { 
			overflow:auto;
			border-left:1px dashed #000;
			border-right:1px dashed #000;
			padding-left:2px; }
		
		#rodzic {
        background-color:black;
        border:3px dashed red;
        font-size:1.4em;
      }

      #dziecko1 {
        float:left;
        width:70%;
        background-color:lightblue;
      }

      #dziecko2 {
        float:left;
        width:30%;
        background-color:lightgreen;
      }

      .floatfix {
        zoom:1; 
      }

      .floatfix:after {
        content:'';
        display:block;
        clear:both;
      }
		</style>
		
		
        <title>Tworzenie ankiety</title>

        

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">

        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />


        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">


        <!-- jQuery Load -->
        <script src="assets/js/jquery-min.js"></script>
	

	
<?php

include "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
    if($polaczenie->connect_errno!=0) // jeśli nie uda się połączyć z bazą
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
	
			$maksAnkiet = 10;
			//$_SESSION['id'] = 1;
			
			if(isset($_SESSION['id']))
			{
				$IdUser = $_SESSION['id'];
				
				//Sprawdzam ile jest ankiet (max 10)
				$zapytanie = "SELECT count(idAnkiety) as liczbaAnkiet from ankiety
				where Uzytkownicy_idUsers = {$IdUser} ";
								
				if ($wynik = mysqli_query($polaczenie, $zapytanie)) {
					$row = mysqli_fetch_assoc($wynik);
					$liczbaAnkiet = $row["liczbaAnkiet"] ;
								
					if($liczbaAnkiet > $maksAnkiet){
						echo '<center><div class="alert alert-danger" role="alert">Masz już  ',$liczbaAnkiet,' ankiet nie możesz dodać więcej</div><center>';
						header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
						exit;
					}
	
								
				}
				
				
			}
			else {
				echo '<center><div class="alert alert-danger" role="alert">Nie jesteś zalogowany</div><center>';
				header('Refresh: 2;url=index.php');  //po 2 sekundach przekierowuje nas do strony glownej
				exit;
	}
}
?>
	
	<form method="POST" action="ankieta_action.php" >
		<div class="input_fields_wrap" id="content">
			<div class="guziki"	id="fixme">
				<input name="submit" type="submit" class="btn btn-primary " value="Akceptuj">  <!--przycisk do wyslania zapytania -->
			</div>
			<br></br>
			<p>Tytuł ankiety</p> <input type="text"  required class="form-control" placeholder="Tytuł" name="tytulAnkiety"/></p>
			<p>Opis ankiety</p> <input type="text"  required class="form-control" placeholder="Opis" name="opisAnkiety"/></p>
			
			
			
			
			<div class="form-inline" role="form">
				
				 <div class="form-group">
				<label class="sr-only" for="Anonimowosc">Anonimowosc</label>
				<p>Anonimowość</p>
				<input type="radio" name="Anonimowosc" value="1" >Tak
				<input type="radio" name="Anonimowosc"  value="0"checked>Nie
			  </div>
			</div>
				

			</form>

				
				<!-- Może pozniej sie to przyda?
				
			  <div class="form-group" >
				<label class="sr-only" for="Województwo">Województwo:</label>
				<p>Województwo:</p>
				<select  name="Województwo"> 
					<option value="" selected="selected"></option>
					< ?php
						
							$wojewodztwa = array(
							0=>'dolnośląskie',
							1=>'kujawsko-pomorskie',
							2=>'lubelskie',
							3=>'lubuskie',
							4=>'łódzkie',
							5=>'małopolskie',
							6=>'mazowieckie',
							7=>'opolskie',
							8=>'podkarpackie',
							9=>'podlaskie',
							10=>'pomorskie',
							11=>'śląskie',
							12=>'świętokrzyskie',
							13=>'warmińsko-mazurskie',
							14=>'wielkopolskie',
							15=>'zachodniopomorskie'
							); 
							for ($i = 0; $i <= 15; $i++) {
							echo "<option VALUE='{$wojewodztwa[$i]}'> {$wojewodztwa[$i]}</option>";
								}
						?>
				</select>
			  </div>
			  
			  <div class="form-group" style="margin-left: 3%">
				<label class="sr-only" for="Płeć">Płeć:</label>
				<p>Płeć:</p>
				<select name="Płeć"> 
					<option value="" selected="selected"></option>
					< ?php 
							
					
							$plec = array(
							0=>'meżczyzna',
							1=>'kobieta',
							); 
							for ($i = 0; $i <= 1; $i++) {
							echo "<option VALUE='{$i}'> {$plec[$i]}</option>";
								}
						?>
				</select>
			  </div>
			  
			   <div class="form-group" style="margin-left: 3%">
				<label class="sr-only" for="Wiek">Wiek:</label>
				<p>Wiek:</p>
				<select name="Wiek"> 
					<option value="" selected="selected"></option>
					< ?php 
					
					
							$wiek = array(
							0=>'8-12',
							1=>'12-16',
							2=>'16-20',
							3=>'20-24',
							4=>'24-40',
							5=>'40-60',
							6=>'60+',
							); 
							for ($i = 0; $i <= 6; $i++) {
							echo "<option VALUE='{$i}'> {$wiek[$i]}</option>";
								}
						?>
				</select>
			  </div>
			  
			 <div class="form-group" style="margin-left: 3%">
				<label class="sr-only" for="pokazujWyniki">pokazujWyniki</label>
				<p>Pokazuj wyniki</p>
				<input type="radio" name="pokazujWyniki" value="Tak" checked>Tak
				<input type="radio" name="pokazujWyniki"  style="margin-left: 5%"value="Nie">Nie
			  </div>
			</div>
	
				</form>
			<script>window.scrollTo(0,document.body.scrollHeight);</script>
	
		</div>

		
-->
	

	
</html>

