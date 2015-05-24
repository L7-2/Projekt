<?php
session_start();
include "connect.php";
mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");
if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
{
	header('Location: menu.php');
	exit();
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ankiety Online</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
	</head>
        <body>
			<div id = container>
		<div id = logo>
		<center><img src="obrazki/ankieta.png" width="1000" height="200" /></center>
		</div>
		<div id = menu>
			<a href="index.php">
                            <div class="option">Strona główna</div></a>
			<a href="rejestracja_form.php">
                            <div class="option">Zarejestruj się</div></a>
			<a href="kontakt.php">
                            <div class="option">Kontakt</div></a>
			<div id = "uzytkownik">
			<!-- Utworzenie formularza logowania -->
            <form action="logowanie.php" method="post">
                Login: <input type="text" name="login"/>
                &nbsp;&nbsp;&nbsp;Hasło: <input type="password" name="haslo"/>
                &nbsp;&nbsp;<input type="submit" value="Zaloguj się"/>
            </form>
			<?php
			if(isset($_SESSION['blad'])){ echo $_SESSION['blad'];
			unset($_SESSION['blad']);}
			if(isset($_SESSION['zablokowany'])) {echo $_SESSION['zablokowany'];
			unset($_SESSION['zablokowany']);}
			?>
			</div>
			<div style="clear:both;"></div>
			</div>
		<div id="topbar">
			<div id="topbarL">
				<img src="obrazki/zdj.png" width="150" height="124"/>
			</div>
			<div id="topbarR">
				<span class="bigtitle">Ankiety Online</span>
				<div style="height: 15px;"></div>
				Serwis ankietyprz.pl został stworzony, aby w prosty sposób tworzyć ankiety internetowe o zaawansowanej funkcjonalności oraz zbierać, analizować i eksportować wyniki zebrane od respondentów. 
				Zapraszamy do testowania konta demo i założenia własnego konta, które oferujemy za darmo. 
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="sidebar">
			<div class="optionL" style="color: #000000">O serwisie</div>
		</div>
		
		<div id="content">
			<span class="bigtitle">Rejestracja</span>
			
			<div class="dottedline"></div>
				<div id = rejestruj style="margin-left: 5%;">
                <form method="POST" action="rejestracja.php">
                <b>Login:</b> <input type="text" name="login" style="margin-left: 9.3%;"/><br>
                <b>Hasło:</b> <input type="password" name="haslo1" style="margin-left: 9.3%;"/><br>
                <b>Powtórz hasło:</b> <input type="password" name="haslo2"/><br>
                <b>Email:</b> <input type="text" name="email" style="margin-left: 9.5%;"/><br>
                <b>Imie:</b> <input type="text" name="imie" style="margin-left: 9.3%;"/><br/>
                 <b>Nazwisko:</b>  <input type="text" name="nazwisko" style="margin-left: 9.3%;"/><br/>
                 <b>Płeć:</b>
                 <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="female");?>
                    value="0">Kobieta
                    <input type="radio" name="plec"
                    <?php if (isset($plec) && $plec=="male");?>
                    value="1">Mężczyzna
                 <br/>
                 <b>Data urodzenia (0000-00-00):</b> <input name="data_ur" type="date"/><br/>
                  <b> Województwo:<br></b>
                   <select name="wojewodztwo">
                   <option value="dolnoslaskie" selected>dolnośląskie</option>
                   <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                   <option value="lubelskie">lubelskie</option>
                   <option value="lubuskie">lubuskie</option>
                   <option value="lodzkie">łódzkie</option>
                   <option value="malopolskie">małopolskie</option>
                   <option value="mazowieckie">mazowieckie</option>
                   <option value="opolskie">opolskie</option>
                   <option value="podkarpackie">podkarpackie</option>
                   <option value="podlaskie">podlaskie</option>
                   <option value="pomorskie">pomorskie</option>
                   <option value="slaskie">śląskie</option>
                   <option value="swietokrzyskie">świętokrzyskie</option>
                   <option value="warminsko-mazurskie">warmińsko-mazurskie</option>
                   <option value="wielkopolskie">wielkopolskie</option>
                   <option value="zachodniopomorskie">zachodniopomorskie</option>
                   </select>
               <br/><input type="submit" value="Utwórz konto" name="rejestruj">
                </form>
				<?php
                                if(isset($_SESSION['blad_dane'])){ echo $_SESSION['blad_dane'];
                                unset($_SESSION['blad_dane']);}
				if(isset($_SESSION['zlehaslo'])) {echo $_SESSION['zlehaslo'];
				unset($_SESSION['zlehaslo']);}
				if(isset($_SESSION['zajetylogin'])) {echo $_SESSION['zajetylogin'];
				unset($_SESSION['zajetylogin']);}
				?>
				</div>
			</div>	
			</div>	
		
		<div id="footer">
			Najlepszy darmowy serwis z ankietami
		</div>
	</div>
        </body>
</html>