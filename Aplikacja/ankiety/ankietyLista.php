<?php


$q = "SELECT * FROM ankiety";
$result = $mysqli->query($q);


echo '<table>';
echo '<thead>';
echo '<th>id</th>';
echo '<th>tytuł</th>';
echo '<th>opis</th>';
echo '<th>rodzaj pytania</th>';
echo '<th>anonimowość</th>';
echo '<th>właściciel</th>';
echo '<th>akcje</th>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_object()) {
    echo '<tr>';
    echo '<td>' . $row->idAnkiety . '</td>';
    echo '<td>' . $row->Tytul . '</td>';
    echo '<td>' . $row->Opis . '</td>';
    echo '<td>' . $row->Rodzaj_pytania . '</td>';
    echo '<td>' . $row->Anonimowosc . '</td>';
    echo '<td>' . $row->Uzytkownicy_idUsers . '</td>';
    echo '<td>';
    echo '<a href="?p=ankietyOdpowiedz&id=' . $row->idAnkiety . '">wypełnij</a> ';
    if ($row->Uzytkownicy_idUsers == $_SESSION['id']) {
        echo '<a href="?p=ankietyEdycja&id=' . $row->idAnkiety . '">edytuj</a> ';
        echo '<a href="?p=ankietyUsun&id=' . $row->idAnkiety . '">usuń</a> ';
        echo '<a href="?p=ankietyWyniki&id=' . $row->idAnkiety . '">wyniki</a> ';
    }
    echo '</td>';
    echo '</td>';
    echo '</tr>';
}

echo '<tbody>';
echo '</table>';
