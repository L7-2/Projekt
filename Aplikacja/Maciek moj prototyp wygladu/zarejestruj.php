 
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ankiety online</title>

        

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
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

    <body data-spy="scroll" data-offset="20" data-target="#navbar">
    <!-- Nav Menu Section -->
    <div class="logo-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-3">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#home"><i class="fa fa-briefcase"></i>Rejestracja</a>
        </div>

		
		
		
  
<!-- Nav Menu Section End -->

<!-- Logowanie -->

<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Formularz</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="login">Nazwa</label>
      <div class="controls">
        <input type="text" id="login" name="login" placeholder="login" class="input-xlarge">
        
      </div>
    </div>
 
 
  <div class="control-group">
      <!-- Imie -->
      <label class="control-label"  for="Imie">Imie</label>
      <div class="controls">
        <input type="text" id="Imie" name="Imie" placeholder="Imie" class="input-xlarge">
        
      </div>
    </div>
	
	<div class="control-group">
      <!-- naziwskoe -->
      <label class="control-label"  for="login">Nazwisko</label>
      <div class="controls">
        <input type="text" id="Nazwisko" name="Nazwisko" placeholder="Nazwisko" class="input-xlarge">
        
      </div>
    </div>
	
	<div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">Plec</label>
      <div class="controls">
       <select>
  <option type ="text" value="Kobieta" id="Plec" name="Plec">Kobieta</option>
 <option type ="text" value="Kobieta" id="Plec" name="Plec">Mezczyzna</option>
 <!-- jak pobrac z tego dane?????????????????? -->
</select>
        
      </div>
    </div>
	
	
		<div class="control-group">
      <!-- naziwskoe -->
      <label class="control-label"  for="login">Data urodzenia</label>
      <div class="controls">
        	<input type="date" name="bday">
        
		</div>
    </div>
	
<div class="control-group">
      <!-- Miejsce zamieszkania -->
      <label class="control-label"  for="login">Miejsce zamieszkania</label>
      <div class="controls">
        <input type="text" id="Miejsce zamieszkania" name="Miejsce zamieszkania" placeholder="Miejsce zamieszkania" class="input-xlarge">
        
      </div>
    </div>
	
	
	
	
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="Adres e-mail" class="input-xlarge">
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- haslo1-->
      <label class="control-label" for="haslo1">Haslo</label>
      <div class="controls">
        <input type="haslo1" id="haslo1" name="haslo1" placeholder="" class="input-xlarge">
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- haslo1 -->
      <label class="control-label"  for="haslo2">Potwierdz haslo</label>
      <div class="controls">
        <input type="haslo1" id="haslo2" name="haslo2" placeholder="" class="input-xlarge">
      
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
	  <br>
	  <input type="submit"   class="btn btn-success" value="Rejestruj" name="rejestruj">
	  <br></br>
	    
        <a href="index.php" class="btn btn-success" >Powrot</a>
      </div>
    </div>
  </fieldset>
</form>
</body>
    </html>
<?php
mysql_connect("localhost","root","");
mysql_select_db("mydb");
 
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
	$imie = filtruj($_POST['imie']);
	$haslo1 = filtruj($_POST['haslo1']);
	$haslo2 = filtruj($_POST['haslo2']);
	$email = filtruj($_POST['email']);
	$ip = filtruj($_SERVER['REMOTE_ADDR']);
 
	// sprawdzamy czy login nie jest ju¿ w bazie
	if (mysql_num_rows(mysql_query("SELECT login FROM uzytkownicy WHERE login = '".$login."';")) == 0)
	{
		if ($haslo1 == $haslo2) // sprawdzamy czy has³a takie same
		{
			mysql_query("INSERT INTO `uzytkownicy` (`Login`, `Haslo`, `Adres_email`, `Data_zalozenia_konta`)
				VALUES ('".$login."', '".md5($haslo1)."', '".$email."', '".date("Y-m-d")."');");
				
 
			echo "Konto zostalo utworzone!";
		}
		else echo "Hasla nie s¹ takie same";
	}
	else echo "Podany login jest juz zajety.";
}
?>

<!-- Hero Area Section End-->




  