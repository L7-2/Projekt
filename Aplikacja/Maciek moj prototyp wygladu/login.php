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
		

			<?php
			function logowanie() { 
     
if($_SESSION['logowanie'] == 'poprawne') { 
     
   $string  = '<FORM action="'.getenv(REQUEST_URI).'" method="post">'; 
      $string .= '   <INPUT type="submit" name="wylogowanie" value="Wyloguj">'; 
      $string .= '</FORM>'; 
       
} else { 
   $string = '<FORM action="'.getenv(REQUEST_URI).'" method="post">'; 
      $string .= '<UL style="list-style-type: none; margin: 0; padding: 
0;">'; 
       
      if(isset($_SESSION['logowanie'])) $string .= 
'<LI>'.$_SESSION['logowanie'].'</LI>'; 
       
      $string .= '<LI>Login: <INPUT type="text" name="login"></LI>'; 
      $string .= '<LI>Haslo: <INPUT type="text" name="haslo"></LI>'; 
      $string .= '<LI><INPUT type="submit" name="logowanie" value="Logowanie"></LI>'; 
      $string .= '</UL>'; 
      $string .= '</FORM>'; 
       
} 
return $string; 
} 
			?>
		
		
		
       </body>
    </html>
<!-- Nav Menu Section End -->

<!-- Logowanie -->


   