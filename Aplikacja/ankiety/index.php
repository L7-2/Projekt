<?php

session_start();


require_once("db.php");


echo '<a href="index.php">ankiety</a> <hr/>';


if (array_key_exists('p', $_GET)){
    $subPage = $_GET['p'];
} else {
    $subPage = 'ankietyLista';
}


switch($subPage) {
    case 'ankietyEdycja':
        include("ankietyEdycja.php");
        break;
    case 'ankietyUsun':
        include("ankietyUsun.php");
        break;
    case 'ankietyLista':
    default:
    include("ankietyLista.php");
        break;
}

