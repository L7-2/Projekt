    <!DOCTYPE html>
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
          <a class="navbar-brand" href="#home"><i class="fa fa-briefcase"></i> Logowanie</a>
        </div>

      
<!-- Nav Menu Section End -->

<!-- Logowanie -->

<?php
include 'config.php';
db_connect();
 
// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zaloguj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = clear($_POST['name']);
        $_POST['password'] = clear($_POST['password']);
        // i kodujemy hasło
        $_POST['password'] = codepass($_POST['password']);
 
        // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
        $result = mysql_query("SELECT login, haslo FROM uzytkownicy WHERE login = '{$_POST['name']}' AND haslo = '{$_POST['password']}' LIMIT 1");
        if(mysql_num_rows($result) > 0) {
            // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "user_id" wstawiamy id usera
            $row = mysql_fetch_assoc($result);
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            echo '<p>Zostałeś poprawnie zalogowany! Możesz teraz przejść na <a href="index.php">stronę główną</a>.</p>';
        } else {
            echo '<p>Podany login i/lub hasło jest nieprawidłowe.</p>';
        }
    }
 
    // wyświetlamy komunikat na zalogowanie się
    echo '<form method="post" action="login.php">
        <p>
            Login:<br>
            <input type="text" value="'.$_POST['name'].'" name="name">
        </p>
        <p>
            Hasło:<br>
            <input type="password" value="'.$_POST['password'].'" name="password">
        </p>
        <p>
            <input type="submit" value="Zaloguj">
        </p>
    </form>';
} else {
echo '<p>Jesteś już zalogowany, więc nie możesz się zalogować ponownie.</p>
        <p>[<a href="index.php">Powrót</a>]</p>';
}
 
db_close();
?>

 </body>
    </html>
   