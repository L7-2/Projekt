<?php

$id = $_GET['id'];

// Sprawdzanie czy id jest napewno liczbą.
if (!is_numeric($id)) {
    header('Location: index.php');
}

// Pobieranie danych z bazy
$q = "SELECT * FROM ankiety WHERE idAnkiety=$id";

// Sprawdzanie czy napewno coś dostaliśmy
if (!($result = $mysqli->query($q))) {
    header('Location: index.php');
}

$row = $result->fetch_object();

// Sprawdzanie czy napewno właściciel chce edytować ankietę
if ($row->Uzytkownicy_idUsers != $_SESSION['id']) {
    echo 'To nie jest twoja ankieta';
    exit;
}

// Aktualizacja danych
if ($_POST) {
    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $anonimowosc = $_POST['anonimowosc'];

    // Aktualizacja danych w bazie
    $q = "UPDATE ankiety SET Tytul='$tytul', Opis='$opis', Rodzaj_pytania='$rozdaj', Anonimowosc='$anonimowosc' WHERE idAnkiety=$id";
    $mysqli->query($q);

    // Przekierowanie na tą samą stronę (odświeżenie danych w formularzu)
    header('Location: http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI]);
}

echo '<form acrion="" method="POST">';
echo 'id: ' . $row->idAnkiety . ' <br/>';
echo 'tytuł: <input type="text" name="tytul" value="' . $row->Tytul . '" maxlength="45" /> <br/>';
echo 'opis: <input type="text" name="opis" value="' . $row->Opis . '" maxlength="45" /> <br/>';
echo 'anonimowosc: ';
echo '<select name="anonimowosc">';
echo '<option value="0" ' . ($row->Anonimowosc == 0 ? 'selected="selected"' : '') . ' >nie</option>';
echo '<option value="1" ' . ($row->Anonimowosc == 1 ? 'selected="selected"' : '') . ' >tak</option>';
echo '</select> <br/>';
echo 'właściciel: ' . $row->Uzytkownicy_idUsers . ' <br/>';
echo '<input type="submit" value="zapisz" />';
echo '</form>';
