-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Kwi 2015, 13:00
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankiety`
--

CREATE TABLE IF NOT EXISTS `ankiety` (
`idAnkiety` int(11) NOT NULL,
  `Rodzaj_pytania` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Typ_ankiety` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Anonimowosc` tinyint(1) NOT NULL,
  `Wstep` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Uzytkownicy_idUsers` int(11) NOT NULL,
  `Wykresy_idWykresy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE IF NOT EXISTS `pytania` (
`idPytania` int(11) NOT NULL,
  `Tresc_pytania_1` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_1` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_2` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_2` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_3` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_3` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_4` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedź 4` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Treść pytania 5` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_5` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_6` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_6` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_7` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedź 7` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_8` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_8` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Treść pytania 9` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_9` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc_pytania_10` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Odpowiedz_10` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Ankiety_idAnkiety` int(11) NOT NULL,
  `Ankiety_Uzytkownicy_idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
`idUsers` int(11) NOT NULL,
  `Login` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Plec` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Data_urodzenia` date DEFAULT NULL,
  `Miejsce_zamieszkania` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Adres_email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Data_zalozenia_konta` date DEFAULT NULL,
  `Wypelnione_ankiety` int(11) DEFAULT NULL,
  `Zamieszczone_ankiety` int(11) DEFAULT NULL,
  `Administrator` tinyint(1) DEFAULT NULL,
  `Ankietowany` tinyint(1) DEFAULT NULL,
  `Ankietujacy` tinyint(1) DEFAULT NULL,
  `Zablokowany` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idUsers`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Plec`, `Data_urodzenia`, `Miejsce_zamieszkania`, `Adres_email`, `Data_zalozenia_konta`, `Wypelnione_ankiety`, `Zamieszczone_ankiety`, `Administrator`, `Ankietowany`, `Ankietujacy`, `Zablokowany`) VALUES
(4, 'af', 'af', 'qw', 'qw', NULL, NULL, NULL, 'af', '2015-04-16', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'ui', 'ui', 'ty', 'ty', NULL, NULL, NULL, 'ui', '2015-04-16', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'vb', 'vb', '', '', NULL, NULL, NULL, 'vb', '2015-04-16', NULL, NULL, NULL, NULL, NULL, 1),
(7, 'Ä…Ä‡lo krâ‚¬', 'Ä…Ä‡lo krâ‚¬', '', '', NULL, NULL, NULL, 'Ä…Ä‡lo krâ‚¬', '2015-04-16', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wykresy`
--

CREATE TABLE IF NOT EXISTS `wykresy` (
`idWykresy` int(11) NOT NULL,
  `Kolumnowy` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Liniowy` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Slupkowy` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zaproszenia`
--

CREATE TABLE IF NOT EXISTS `zaproszenia` (
`idZaproszenia` int(11) NOT NULL,
  `Tytul_ankiety` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Cel_ankiety` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Krotki_opis` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `idAnkiety` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Ankiety_idAnkiety` int(11) NOT NULL,
  `Ankiety_Uzytkownicy_idUsers` int(11) NOT NULL,
  `Ankiety_Wykresy_idWykresy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ankiety`
--
ALTER TABLE `ankiety`
 ADD PRIMARY KEY (`idAnkiety`,`Uzytkownicy_idUsers`,`Wykresy_idWykresy`), ADD KEY `fk_Ankiety_Użytkownicy_idx` (`Uzytkownicy_idUsers`), ADD KEY `fk_Ankiety_Wykresy1_idx` (`Wykresy_idWykresy`);

--
-- Indexes for table `pytania`
--
ALTER TABLE `pytania`
 ADD PRIMARY KEY (`idPytania`,`Ankiety_idAnkiety`,`Ankiety_Uzytkownicy_idUsers`), ADD KEY `fk_Pytania_Ankiety1_idx` (`Ankiety_idAnkiety`,`Ankiety_Uzytkownicy_idUsers`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
 ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `wykresy`
--
ALTER TABLE `wykresy`
 ADD PRIMARY KEY (`idWykresy`);

--
-- Indexes for table `zaproszenia`
--
ALTER TABLE `zaproszenia`
 ADD PRIMARY KEY (`idZaproszenia`,`Ankiety_idAnkiety`,`Ankiety_Uzytkownicy_idUsers`,`Ankiety_Wykresy_idWykresy`), ADD KEY `fk_Zaproszenia_Ankiety1_idx` (`Ankiety_idAnkiety`,`Ankiety_Uzytkownicy_idUsers`,`Ankiety_Wykresy_idWykresy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
MODIFY `idAnkiety` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
MODIFY `idPytania` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `wykresy`
--
ALTER TABLE `wykresy`
MODIFY `idWykresy` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `zaproszenia`
--
ALTER TABLE `zaproszenia`
MODIFY `idZaproszenia` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
ADD CONSTRAINT `fk_Ankiety_Użytkownicy` FOREIGN KEY (`Uzytkownicy_idUsers`) REFERENCES `uzytkownicy` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Ankiety_Wykresy1` FOREIGN KEY (`Wykresy_idWykresy`) REFERENCES `wykresy` (`idWykresy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
ADD CONSTRAINT `fk_Pytania_Ankiety1` FOREIGN KEY (`Ankiety_idAnkiety`, `Ankiety_Uzytkownicy_idUsers`) REFERENCES `ankiety` (`idAnkiety`, `Uzytkownicy_idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zaproszenia`
--
ALTER TABLE `zaproszenia`
ADD CONSTRAINT `fk_Zaproszenia_Ankiety1` FOREIGN KEY (`Ankiety_idAnkiety`, `Ankiety_Uzytkownicy_idUsers`, `Ankiety_Wykresy_idWykresy`) REFERENCES `ankiety` (`idAnkiety`, `Uzytkownicy_idUsers`, `Wykresy_idWykresy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
