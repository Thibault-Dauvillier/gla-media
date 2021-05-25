--   __      _______ ________          _______
--   \ \    / /_   _|  ____\ \        / / ____|
--    \ \  / /  | | | |__   \ \  /\  / / (___
--     \ \/ /   | | |  __|   \ \/  \/ / \___ \
--      \  /   _| |_| |____   \  /\  /  ____) |
--       \/   |_____|______|   \/  \/  |_____/
--
--
CREATE OR REPLACE VIEW vue_dvd AS
SELECT id_dvd,titre,description,date_parution,prix,quantite,realisateur,editeur,duree,nom_genre,id_produit
FROM DVD NATURAL JOIN PRODUIT NATURAL JOIN GENRE;

CREATE OR REPLACE VIEW vue_cd AS
SELECT id_cd,titre,description,date_parution,prix,quantite,compositeur,duree,nom_genre,id_produit
FROM CD NATURAL JOIN PRODUIT NATURAL JOIN GENRE;

CREATE OR REPLACE VIEW vue_livre AS
SELECT id_livre,titre,description,date_parution,prix,quantite,auteur,nb_page,nom_genre,id_produit
FROM LIVRE NATURAL JOIN PRODUIT NATURAL JOIN GENRE;


-- view to check all product and facilitate the search
-- this view returns id_produit, title (may it be livre,cd or dvd), description (same), maker as the autor OR director OR compositor and the quantite
CREATE OR REPLACE VIEW vue_all_produit AS
(SELECT id_produit,titre,description,compositeur as maker,quantite FROM CD NATURAL JOIN PRODUIT
UNION
SELECT id_produit,titre,description,realisateur as maker,quantite FROM DVD NATURAL JOIN PRODUIT
UNION
SELECT id_produit,titre,description, auteur as maker,quantite FROM LIVRE NATURAL JOIN PRODUIT)
ORDER BY id_produit;

CREATE OR REPLACE VIEW vue_all_abonne AS
SELECT *
FROM PERSONNE
WHERE statut = 'abonne';

CREATE OR REPLACE VIEW vue_all_employe AS
SELECT *
FROM PERSONNE
WHERE statut = 'employe';

CREATE OR REPLACE VIEW vue_all_gestionnaire AS
SELECT *
FROM PERSONNE
WHERE statut = 'gestionnaire';





-- THIS IS AND EVENT, made to happen every day, calls to check every subscription to check if they're still valid
-- needs the event_shceduller var ON to work
SET GLOBAL event_scheduler=ON;
DROP EVENT IF EXISTS check_abo;
CREATE EVENT check_abo
  ON SCHEDULE
    EVERY 1 DAY
  DO
   CALL lock_on_date()












--    ______ _    _ _   _  _____ _______ _____ ____  _   _       __  _____  _____   ____   _____ ______ _____  _    _ _____  ______
--   |  ____| |  | | \ | |/ ____|__   __|_   _/ __ \| \ | |     / / |  __ \|  __ \ / __ \ / ____|  ____|  __ \| |  | |  __ \|  ____|
--   | |__  | |  | |  \| | |       | |    | || |  | |  \| |    / /  | |__) | |__) | |  | | |    | |__  | |  | | |  | | |__) | |__
--   |  __| | |  | | . ` | |       | |    | || |  | | . ` |   / /   |  ___/|  _  /| |  | | |    |  __| | |  | | |  | |  _  /|  __|
--   | |    | |__| | |\  | |____   | |   _| || |__| | |\  |  / /    | |    | | \ \| |__| | |____| |____| |__| | |__| | | \ \| |____
--   |_|     \____/|_| \_|\_____|  |_|  |_____\____/|_| \_| /_/     |_|    |_|  \_\\____/ \_____|______|_____/ \____/|_|  \_\______|
--
--



-- function to see all emprunt of a given as arg personne (given as id_personne)
DELIMITER // -- delimeter needs to be putted for PHPmyAdmin to understand that we're treating with a procedure
DROP PROCEDURE IF EXISTS view_all_emprunt //

CREATE PROCEDURE view_all_emprunt( id INT )
BEGIN
SELECT * FROM EMPRUNT NATURAL JOIN vue_all_produit
WHERE id_personne= id
;
END
//
DELIMITER ;


-- function to see all emprunt of a given as arg personne (given as id_personne)
DELIMITER // -- delimeter needs to be putted for PHPmyAdmin to understand that we're treating with a procedure
DROP PROCEDURE IF EXISTS set_recupere //

CREATE PROCEDURE set_recupere( id INT )
BEGIN
UPDATE EMPRUNT SET recupere = 1 WHERE id_emprunt = id;
;
END
//
DELIMITER ;









-- fonction to sign in using every personnal information and hashing the given password, also checking minimum age
DELIMITER //
DROP PROCEDURE IF EXISTS inscription//
CREATE PROCEDURE inscription(l_prenom VARCHAR(64),l_nom VARCHAR(64),l_numero VARCHAR(16), l_adresse VARCHAR(256), l_mail VARCHAR(256),l_birthdate DATE, l_password VARCHAR(64),l_statut VARCHAR(64))
BEGIN
DECLARE age INT;
SELECT TIMESTAMPDIFF(YEAR, l_birthdate, CURDATE()) INTO age;

IF age < 16 THEN
  SIGNAL SQLSTATE '45000'
			 SET MESSAGE_TEXT = "Age minimum necessaire non atteint";
ELSE
  INSERT INTO PERSONNE (prenom, nom, numero, adresse, mail,birthdate, password, statut, locked, dateFinAbo) VALUES
  (l_prenom,l_nom,l_numero,l_adresse,l_mail,l_birthdate,SHA(l_password),l_statut,FALSE,DATE_ADD(SYSDATE(),INTERVAL 1 YEAR));
END IF;
END
//
DELIMITER ;









--fonction to connect preventing SQLi, returns 0 for invalid crendentials and 1 for valid crendentials
DELIMITER //
DROP PROCEDURE IF EXISTS connection//
CREATE PROCEDURE connection(l_mail VARCHAR(256), l_password VARCHAR(64), l_statut VARCHAR(64))
BEGIN
  DECLARE r INT;
  SELECT COUNT(*) INTO r FROM PERSONNE WHERE  mail=l_mail AND password = SHA(l_password) AND statut=l_statut;
  IF r = 1 THEN
    SELECT id_personne,nom,prenom,mail,locked,statut FROM PERSONNE WHERE  mail=l_mail AND password = SHA(l_password) AND statut=l_statut;
  ELSE
    SIGNAL SQLSTATE '45000'
			 SET MESSAGE_TEXT = "Le mdp ou le mail est mauvais";
  END IF;
END
//
DELIMITER ;






--fonction to check if the subscription is over, and fi yes, lock the account (will run daily with an event scheduler)
DELIMITER //
DROP PROCEDURE IF EXISTS lock_on_date//
CREATE PROCEDURE lock_on_date()
BEGIN
    DECLARE date_abo DATE;
    DECLARE id INT;
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE cur CURSOR FOR SELECT dateFinAbo,id_personne FROM vue_all_abonne ;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

    OPEN cur;

    checking: LOOP

  		FETCH cur INTO date_abo,id;

  		IF finished = 1 THEN
  			LEAVE checking;
  		END IF;

  		IF date_abo < SYSDATE() THEN
        CALL lock_account(id);
      END IF;

	   END LOOP checking;
	CLOSE cur;
END
//




-- procedure to lock and account using id as arg
DELIMITER //
DROP PROCEDURE IF EXISTS lock_account//
CREATE PROCEDURE lock_account(id INT)
BEGIN
UPDATE PERSONNE SET locked = TRUE WHERE id_personne = id;
END
//
DELIMITER ;



-- procedure to change password
DELIMITER //
DROP PROCEDURE IF EXISTS change_password//
CREATE PROCEDURE change_password(id INT,old VARCHAR(64), new VARCHAR(64))
BEGIN
    DECLARE r INT;
    SELECT COUNT(*) INTO r FROM PERSONNE WHERE  id_personne = id AND password = SHA(old);
    IF r = 1 THEN
      UPDATE PERSONNE SET password = SHA(new) WHERE id_personne = id;
    ELSE
      SIGNAL SQLSTATE '45000'
  			 SET MESSAGE_TEXT = "l'ancien mdp est mauvais";
    END IF;
END
//
DELIMITER ;







-- procedure to renew a subscription (+1 year based on sysdate)
DELIMITER //
DROP PROCEDURE IF EXISTS nouveau_abonnement//
CREATE PROCEDURE nouveau_abonnement(id_p INT)
BEGIN
UPDATE PERSONNE SET dateFinAbo = DATE_ADD(SYSDATE(),INTERVAL 1 YEAR) WHERE id_personne = id_p;
UPDATE PERSONNE SET locked = FALSE WHERE id_personne = id_p;
END
//
DELIMITER ;


-- procedure to renew a subscription (+1 year based on sysdate)
DELIMITER //
DROP PROCEDURE IF EXISTS etendre_emprunt//
CREATE PROCEDURE etendre_emprunt(id_emp INT)
BEGIN
DECLARE flag TINYINT;
SELECT prolongeable INTO flag FROM EMPRUNT WHERE id_emprunt = id_emp;
IF flag = 1 THEN
  UPDATE EMPRUNT SET prolongeable = FALSE WHERE id_emprunt = id_emp;
  UPDATE EMPRUNT SET dateRetour = DATE_ADD(dateRetour,INTERVAL 3 WEEK) WHERE id_emprunt = id_emp;
ELSE
SIGNAL SQLSTATE '45000'
   SET MESSAGE_TEXT = "Cette emprunt est improlongeable";
END IF;
END
//
DELIMITER ;









--fonction to create an emprunt with arg1 : id_produit and arg2: id_personne
DELIMITER //
DROP PROCEDURE IF EXISTS create_emprunt//

CREATE PROCEDURE create_emprunt(id_pro int,id_per int)
BEGIN

DECLARE qte,cd,dvd,livre,nb INT;
SELECT id_cd INTO cd FROM PRODUIT WHERE id_produit=id_pro;
SELECT id_dvd INTO dvd FROM PRODUIT WHERE id_produit=id_pro;
SELECT id_livre INTO livre FROM PRODUIT WHERE id_produit=id_pro;

IF cd IS NOT NULL THEN
  SELECT quantite INTO qte FROM CD WHERE id_cd=cd;
END IF;
IF dvd IS NOT NULL THEN
  SELECT quantite INTO qte FROM DVD WHERE id_dvd=dvd;
END IF;
IF livre IS NOT NULL THEN
  SELECT quantite INTO qte FROM LIVRE WHERE id_livre=livre;
END IF;

SELECT COUNT(*) INTO nb FROM EMPRUNT WHERE id_personne=id_per;

IF qte < 1 OR nb > 4  THEN
  SIGNAL SQLSTATE '45000'
			 SET MESSAGE_TEXT = "Il n'y a plus ce produit en stock ou vous avez déja trop d'emprunt";
ELSE
  INSERT INTO EMPRUNT (dateDebut,dateRetour,prolongeable,recupere,id_produit,id_personne) VALUES
  (SYSDATE(),DATE_ADD(SYSDATE(),INTERVAL 3 MONTH),TRUE,FALSE,id_pro,id_per);
END IF;
END
//
DELIMITER ;







--    _______ _____  _____ _____  _____ ______ _____
--   |__   __|  __ \|_   _/ ____|/ ____|  ____|  __ \
--      | |  | |__) | | || |  __| |  __| |__  | |__) |
--      | |  |  _  /  | || | |_ | | |_ |  __| |  _  /
--      | |  | | \ \ _| || |__| | |__| | |____| | \ \
--      |_|  |_|  \_\_____\_____|\_____|______|_|  \_\
--
--

CREATE OR REPLACE TRIGGER add_produit_from_livre
AFTER INSERT ON LIVRE
FOR EACH ROW
INSERT INTO PRODUIT (id_dvd,id_cd,id_livre) VALUES
(null,null,NEW.id_livre);

CREATE OR REPLACE TRIGGER add_produit_from_cd
AFTER INSERT ON CD
FOR EACH ROW
INSERT INTO PRODUIT (id_dvd,id_cd,id_livre) VALUES
(null,NEW.id_cd,null);

CREATE OR REPLACE TRIGGER add_produit_from_dvd
AFTER INSERT ON DVD
FOR EACH ROW
INSERT INTO PRODUIT (id_dvd,id_cd,id_livre) VALUES
(NEW.id_dvd,null,null);



-- trigger to decrement quantite when an emprunt is set
DELIMITER //
CREATE OR REPLACE TRIGGER sub_quantite
AFTER INSERT ON EMPRUNT
FOR EACH ROW

BEGIN
  DECLARE cd,dvd,livre INT;
  SELECT id_cd INTO cd FROM PRODUIT WHERE id_produit=NEW.id_produit;
  SELECT id_dvd INTO dvd FROM PRODUIT WHERE id_produit=NEW.id_produit;
  SELECT id_livre INTO livre FROM PRODUIT WHERE id_produit=NEW.id_produit;

  IF cd IS NOT NULL THEN
    UPDATE CD SET quantite=quantite-1 WHERE id_cd=cd;
  END IF;
  IF dvd IS NOT NULL THEN
    UPDATE dvd SET quantite=quantite-1 WHERE id_dvd=dvd;
  END IF;
  IF livre IS NOT NULL THEN
    UPDATE livre SET quantite=quantite-1 WHERE id_livre=livre;
  END IF;
END//





--trigger to incremement quantite when an emprunt is deleted
DELIMITER //
CREATE OR REPLACE TRIGGER add_quantite
AFTER DELETE ON EMPRUNT
FOR EACH ROW

BEGIN
  DECLARE cd,dvd,livre INT;
  SELECT id_cd INTO cd FROM PRODUIT WHERE id_produit=OLD.id_produit;
  SELECT id_dvd INTO dvd FROM PRODUIT WHERE id_produit=OLD.id_produit;
  SELECT id_livre INTO livre FROM PRODUIT WHERE id_produit=OLD.id_produit;

  IF cd IS NOT NULL THEN
    UPDATE CD SET quantite=quantite+1 WHERE id_cd=cd;
  END IF;
  IF dvd IS NOT NULL THEN
    UPDATE dvd SET quantite=quantite+1 WHERE id_dvd=dvd;
  END IF;
  IF livre IS NOT NULL THEN
    UPDATE livre SET quantite=quantite+1 WHERE id_livre=livre;
  END IF;
END//
