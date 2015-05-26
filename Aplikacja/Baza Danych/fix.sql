-- Pliczek który poprawia klucze obce ze starej bazy danych 

ALTER TABLE ankiety DROP FOREIGN KEY `fk_Ankiety_Uzytkownicy`;
ALTER TABLE ankiety
    ADD CONSTRAINT `fk_Ankiety_Uzytkownicy`
    FOREIGN KEY (`Uzytkownicy_idUsers`)
    REFERENCES `mydb`.`Uzytkownicy` (`idUsers`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
   
   
ALTER TABLE pytania DROP FOREIGN KEY `fk_Pytania_Ankiety1`;
ALTER TABLE pytania
    ADD CONSTRAINT `fk_Pytania_Ankiety1`
    FOREIGN KEY (`Ankiety_idAnkiety`)
    REFERENCES `mydb`.`Ankiety` (`idAnkiety`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
   
   
ALTER TABLE odp_otwarta DROP FOREIGN KEY `fk_Odp_otwarta_Pytania1`;
ALTER TABLE odp_otwarta
    ADD CONSTRAINT `fk_Odp_otwarta_Pytania1`
    FOREIGN KEY (`Pytania_idPytania`)
    REFERENCES `mydb`.`Pytania` (`idPytania`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

	
ALTER TABLE odp_zamknieta DROP FOREIGN KEY `fk_Odp_zamknieta_Pytania1`;
ALTER TABLE odp_zamknieta
    ADD CONSTRAINT `fk_Odp_zamknieta_Pytania1`
    FOREIGN KEY (`Pytania_idPytania`)
    REFERENCES `mydb`.`Pytania` (`idPytania`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

		
ALTER TABLE odp_zamknieta_has_ankietowany DROP FOREIGN KEY `fk_Odp_zamknieta_has_Ankietowany_Ankietowany1`;
ALTER TABLE odp_zamknieta_has_ankietowany DROP FOREIGN KEY `fk_Odp_zamknieta_has_Ankietowany_Odp_zamknieta1`;
ALTER TABLE odp_zamknieta_has_ankietowany
    ADD CONSTRAINT `fk_Odp_zamknieta_has_Ankietowany_Ankietowany1`
    FOREIGN KEY (`Ankietowany_idAnkietowany`)
    REFERENCES `mydb`.`Ankietowany` (`idAnkietowany`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
ALTER TABLE odp_zamknieta_has_ankietowany
    ADD CONSTRAINT `fk_Odp_zamknieta_has_Ankietowany_Odp_zamknieta1`
    FOREIGN KEY (`Odp_zamknieta_idOdp_zamknieta`)
    REFERENCES `mydb`.`Odp_zamknieta` (`idOdp_zamknieta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
	