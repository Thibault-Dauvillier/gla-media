--     _____ ______ _   _ _____  ______
--    / ____|  ____| \ | |  __ \|  ____|
--   | |  __| |__  |  \| | |__) | |__
--   | | |_ |  __| | . ` |  _  /|  __|
--   | |__| | |____| |\  | | \ \| |____
--    \_____|______|_| \_|_|  \_\______|
--
--
INSERT INTO GENRE (id_genre,nom_genre)
  VALUES
  (1,"Action"),
  (2,"Adventure"),
  (3,"Biograpy"),
  (4,"Comedy"),
  (5,"Drama"),
  (6,"History"),
  (7,"Mystery"),
  (8,"Romance"),
  (9,"Fiction"),
  (10,"Thriller"),
  (11,"War"),
  (12,"Western"),
  (13,"Philosophy"),
  (14,"Indie-Pop"),
  (15,"Hip-Pop"),
  (16,"Rap");






  --    _____  ______ _____   _____  ____  _   _ _   _ ______
  --   |  __ \|  ____|  __ \ / ____|/ __ \| \ | | \ | |  ____|
  --   | |__) | |__  | |__) | (___ | |  | |  \| |  \| | |__
  --   |  ___/|  __| |  _  / \___ \| |  | | . ` | . ` |  __|
  --   | |    | |____| | \ \ ____) | |__| | |\  | |\  | |____
  --   |_|    |______|_|  \_\_____/ \____/|_| \_|_| \_|______|
  --
  --
INSERT INTO PERSONNE (prenom, nom, numero, adresse, mail, birthdate, password, statut, locked, dateFinAbo)
VALUES
('Enzo','Barbier','01 03 04 55 88','29 Rue de Coupe-Gorge','enzo.barbier@gmail.com','2000-08-12',SHA('root'),'abonne',FALSE,'2022-08-12'),
('Ryan','Chevalier','03 73 82 30 17','29 Chemin du Vide','ryan.chevalier@gmail.com','2000-04-12',SHA('root'),'abonne',FALSE,'2022-09-22'),
('Yohann','Blackburn','02 33 91 74 38','17 Rue de Coupe-Gorge','yohann.blackburn@universite-paris-saclay.fr','2000-09-02',SHA('blabla'),'abonne',FALSE,'2021-12-12'),
('Minh Kha','Nguyen','06 76 99 34 27','34 Route de Maison Jeannette','minh-kha.nguyen@universite-paris-saclay.fr','2004-08-12',SHA('maman44'),'abonne',TRUE,'2022-11-04'),
('Sarah','Derbah','07 05 16 70 20','163 Avenue de la Paix','sarah.derbah@universite-paris-saclay.fr','1987-08-12',SHA('villneuve66'),'abonne',FALSE,'2022-08-12'),
('Hugo','Mouden','04 44 57 00 12','11 Avenue de la Soif','hugo.mouden@universite-paris-saclay.fr','1999-01-01',SHA('88#spielberg1977'),'employe',null,null),
('Jibril','Zioui','05 15 98 99 69','22 Rue des Rancuniers','jibril.zioui@universite-paris-saclay.fr','2001-05-19',SHA('yes'),'employe',null,null),
('Rayane','Maza','06 51 13 80 77','78 Autoroute du Soleil','rayane.maza@universite-paris-saclay.fr','2002-07-29',SHA('no'),'gestionnaire',null,null);














--    _      _______      _______  ______
--   | |    |_   _\ \    / /  __ \|  ____|
--   | |      | |  \ \  / /| |__) | |__
--   | |      | |   \ \/ / |  _  /|  __|
--   | |____ _| |_   \  /  | | \ \| |____
--   |______|_____|   \/   |_|  \_\______|
--
--
INSERT INTO LIVRE (titre,description,date_parution,prix,quantite,auteur,editeur,nb_page,id_genre)
VALUES
(
  "The Way of Zen",
  "The Way of Zen is a 1957 non-fiction book on Zen Buddhism and Eastern philosophy by philosopher and religious scholar Alan Watts. It was a bestseller and played a major role in introducing Buddhism to a mostly young, Western audience.",
  "1957-01-01",
  "16",
  15,
  "Alan Watts",
  "Vintage Books",
  367,
  13
)
  ,
(
  "The Art of War",
  "The Art of War is an ancient Chinese military treatise dating from the Late Spring and Autumn Period. The work, which is attributed to the ancient Chinese military strategist Sun Tzu, is composed of 13 chapters.",
  null,
  "380",
  5,
  "Sun Tzu",
  null,
  553,
  3
)
  ,
(
  "The Curious Case of Benjamin Button",
  "'The Curious Case of Benjamin Button' is a short story written by F. Scott Fitzgerald. First published in Collier's Magazine on May 27, 1922 with the cover and illustrations by James Montgomery Flagg.",
  "1922-05-27",
  "22.5",
  11,
  "F. Scott Fitzgerald",
  "Collier's",
  117,
  9
);














--     _____ _____
--    / ____|  __ \
--   | |    | |  | |
--   | |    | |  | |
--   | |____| |__| |
--    \_____|_____/
--
--
INSERT INTO CD(titre,description,date_parution,prix,quantite,compositeur,duree,id_genre)
VALUES
(
  "Vertigo",
  "Vertigo is the debut studio album by Irish musician Eden, released on 19 January 2018 through his own label MCMXCV and distributed by Astralwerks. It was produced, mixed and recorded in New York, Los Angeles and Dublin. The album was supported by a world tour.",
  "2018-01-19",
  "11.5",
  30,
  "EDEN",
  52,
  14
)
  ,
(
  "AIM",
  "AIM is the fifth studio album by English rapper and record producer M.I.A.. It was released on 9 September 2016 by Interscope and Polydor Records in the UK. Prior to its release, the rapper claimed that it would be her final album.",
  "2016-09-09",
  "10",
  47,
  "M.I.A",
  64,
  15
)
  ,
(
  "Prose Élite",
  "C'est un très bon album",
  "2017-02-24",
  "999.99",
  3,
  "Médine",
  57,
  16
);








--    _______      _______
--   |  __ \ \    / /  __ \
--   | |  | \ \  / /| |  | |
--   | |  | |\ \/ / | |  | |
--   | |__| | \  /  | |__| |
--   |_____/   \/   |_____/
--
--
INSERT INTO DVD (titre,description,date_parution,prix,quantite,realisateur,editeur,duree,id_genre)
VALUES
(
  "Intouchables",
  "An unusual friendship develops when Driss, a street smart immigrant, is hired to take care of Philippe, a quadriplegic French nobleman.",
  "2011-11-02",
  "15",
  26,
  " Olivier Nakache & Éric Toledano",
  "Gaumont",
  113,
  4
)
  ,
(
  "Eternal Sunshine of the Spotless Mind",
  "Joel and Clementine begin a relationship post a train journey together, unaware that they had previously been in a relationship, the memories of which were clinically erased.",
  "2004-10-06",
  "9.99",
  36,
  "Michel Gondry",
  "Kevin Grin",
  108,
  9
)
  ,
(
  "Apocalypse Now",
  "Captain Willard is sent to Cambodia on a dangerous mission to assassinate a renegade colonel who has won the trust of a local tribe.",
  "1979-10-26",
  "29.5",
  20,
  "Francis Ford Coppola",
  "Century Fox",
  186,
  11
);













--    ______ __  __ _____  _____  _    _ _   _ _______
--   |  ____|  \/  |  __ \|  __ \| |  | | \ | |__   __|
--   | |__  | \  / | |__) | |__) | |  | |  \| |  | |
--   |  __| | |\/| |  ___/|  _  /| |  | | . ` |  | |
--   | |____| |  | | |    | | \ \| |__| | |\  |  | |
--   |______|_|  |_|_|    |_|  \_\\____/|_| \_|  |_|
--
--









INSERT INTO EMPRUNT (dateDebut,DateRetour,prolongeable,recupere,id_personne,id_produit)
VALUES
(
  "2021-05-09",
  "2021-05-29",
  TRUE,
  FALSE,
  1,
  3
)
  ,
(
  "2021-06-01",
  "2021-07-15",
  FALSE,
  FALSE,
  1,
  4
)
  ,
(
  "2021-01-01",
  "2021-12-12",
  FALSE,
  TRUE,
  2,
  1
);
