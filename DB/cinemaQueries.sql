-- a) Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT titre_film, DATE_FORMAT (date_sortie, "%Y"), DATE_FORMAT (SEC_TO_TIME (duree * 60), "%Hh %i"), prenom, nom
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne;

-- b) Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT titre_film
FROM film
WHERE duree >= 135
ORDER BY duree DESC;

-- c) Liste des films d’un réalisateur (en précisant l’année de sortie)
SELECT titre_film, DATE_FORMAT (date_sortie, "%Y")
FROM film
WHERE film.id_realisateur = 1;

-- d) Nombre de films par genre (classés dans l’ordre décroissant)
SELECT nom_genre, COUNT(c.id_film) AS nb_films
FROM genre g
INNER JOIN categoriser c ON g.id_genre = c.id_genre
GROUP BY g.id_genre
ORDER BY nb_films DESC;

-- e) Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT prenom, nom, COUNT(f.id_realisateur) AS nb_films
FROM personne p
INNER JOIN realisateur r ON p.id_personne = r.id_personne
INNER JOIN film f ON r.id_realisateur = f.id_realisateur
GROUP BY p.id_personne
ORDER BY nb_films DESC;

-- f) Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
SELECT prenom, nom, sexe, nom_role
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
INNER JOIN casting c ON a.id_acteur = c.id_acteur
INNER JOIN role r ON c.id_role = r.id_role
WHERE c.id_film = 4;

-- g) Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)
SELECT titre_film, nom_role, DATE_FORMAT (date_sortie, "%Y") AS annee_sortie
FROM role r
INNER JOIN casting c ON r.id_role = c.id_role
INNER JOIN film f ON c.id_film = f.id_film
WHERE c.id_acteur = 1
ORDER BY annee_sortie DESC;

-- h) Liste des personnes qui sont à la fois acteurs et réalisateurs
SELECT prenom, nom
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
INNER JOIN realisateur r ON p.id_personne = r.id_personne
WHERE a.id_personne = r.id_personne;

-- i) Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT titre_film, date_sortie
FROM film
WHERE YEAR(NOW()) - YEAR(date_sortie) < 5
ORDER BY date_sortie DESC;

-- j) Nombre d’hommes et de femmes parmi les acteurs
SELECT sexe, COUNT(a.id_personne)
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
GROUP BY sexe;

-- k) Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
SELECT prenom, nom
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
WHERE YEAR(NOW()) - YEAR(date_naissance) >= 50;

-- l) Acteurs ayant joué dans 3 films ou plus
SELECT prenom, nom
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
INNER JOIN casting c ON a.id_acteur = c.id_acteur
GROUP BY c.id_acteur
HAVING COUNT(c.id_film) >= 3;