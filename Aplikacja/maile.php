<?php
$od  = "From: tomaszpaneknd@gmail.com\r\n";
$od .= 'MIME-Version: 1.0'."\r\n";
$od .= 'Content-type: text/html; charset=iso-8859-2'."\r\n";
$adres = "tomaszpaneknd@gmail.com";
$tytul = "Tytu³ wiadomoœci";
$wiadomosc = "<html>
<head>
</head>
<body>
   <b>Witam serdecznie!</b><br/>
</body>
</html>";
mail($adres, $tytul, $wiadomosc, $od);
?>