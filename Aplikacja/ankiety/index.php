<?php

session_start();

require_once("db.php");

echo '<a href="index.php">ankiety</a>';
if (array_key_exists('login', $_SESSION)) {
    echo ' | zalogowany jako ' . $_SESSION['login'] . ' (id: ' . $_SESSION['id'] . ')';
}
echo '<hr/>';


if (array_key_exists('p', $_GET)){
    $subPage = $_GET['p'];
} else {
    $subPage = 'ankietyLista';
}


switch($subPage) {
    case 'ankietyEdycja':
        include "ankietyEdycja.php";
        break;
		 case 'PytaniaOtwarteDodaj':
        include "PytaniaOtwarteDodaj.php";
        break;
		case 'PytaniaZamknieteDodaj':
        include "PytaniaZamknieteDodaj.php";
        break;
		
    case 'ankietyUsun':
        include "ankietyUsun.php";
        break;
    case 'ankietyOdpowiedz':
        include "ankietyOdpowiedz.php";
        break;
    case 'ankietyWypelnij':
        include "ankietyWypelnij.php";
        break;
    case 'zapiszOdpowiedzi':
        include "zapiszOdpowiedzi.php";
        break;
    case 'ankietyWyniki':
        include "ankietyWyniki.php";
        break;
    case 'ankietyLista':
    default:
    include "ankietyLista.php";
        break;
}

