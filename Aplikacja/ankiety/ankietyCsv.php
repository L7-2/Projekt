<?php

require_once("db.php");

$id = $_GET['id'];

// Sprawdzanie czy id jest napewno liczbą.
if (!is_numeric($id)) {
    header('Location: index.php');
}

require_once "simpleCsv.php";
$csv = new simpleCsv();

$csv->saveRow(array("odpowiedzi zamkniete"));

$q = "
SELECT pytania.idPytania, pytania.Tresc as pytanie, odp_zamknieta.Tresc as odpowiedz,
COUNT(odp_zamknieta_has_ankietowany.Ankietowany_idAnkietowany) as odpowiedzi FROM pytania
INNER JOIN odp_zamknieta ON odp_zamknieta.Pytania_idPytania = pytania.idPytania
LEFT JOIN odp_zamknieta_has_ankietowany ON odp_zamknieta.idOdp_zamknieta = odp_zamknieta_has_ankietowany.Odp_zamknieta_idOdp_zamknieta
WHERE pytania.Ankiety_idAnkiety = $id
GROUP BY odp_zamknieta.idOdp_zamknieta
";

$odpowiedzi = $mysqli->query($q);
$idPytania = 0;
while ($odpowiedz = $odpowiedzi->fetch_object()) {
    if ($idPytania != $odpowiedz->idPytania) {
        $idPytania = $odpowiedz->idPytania;
        $csv->saveRow(array($odpowiedz->pytanie));
    }
    $csv->saveRow(array($odpowiedz->odpowiedzi, $odpowiedz->odpowiedz));
}


$csv->saveRow(array(""));
$csv->saveRow(array("odpowiedzi otwarte"));

$q = "SELECT pytania.idPytania, pytania.Tresc as pytanie, odp_otwarta.Tresc as odpowiedz FROM pytania
INNER JOIN odp_otwarta ON odp_otwarta.Pytania_idPytania = pytania.idPytania WHERE pytania.Ankiety_idAnkiety = $id";

$odpowiedzi = $mysqli->query($q);
$idPytania = 0;
while ($odpowiedz = $odpowiedzi->fetch_object()) {
    if ($idPytania != $odpowiedz->idPytania) {
        $idPytania = $odpowiedz->idPytania;
        $csv->saveRow(array($odpowiedz->pytanie));
    }
    $csv->saveRow(array("", $odpowiedz->odpowiedz));
}



