<?php

namespace Controller;
use Model\Connect;

class CinemaController{
    public function homePage(){
            $pdo = Connect::seConnecter();
            $queryMovieDiscover = $pdo -> query("
                SELECT affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                LIMIT 5
            ");
            $queryPerson = $pdo -> query("
                SELECT prenom, nom
                FROM personne
            ");

            require "view/homePage.php";
        }

    public function listMovies(){
        $pdo = Connect::seConnecter();
        $queryMovieInfo = $pdo -> query("
            SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY date DESC
        ");
        require "view/list/listMovies.php";
    }

    public function listDirectors(){
        $pdo = Connect::seConnecter();
        $queryDirectorInfo = $pdo -> query("
            SELECT CONCAT(prenom, ' ', nom) AS nomRealisateur
            FROM realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listDirectors.php";
    }

    public function listActors(){
        $pdo = Connect::seConnecter();
        $queryActorInfo = $pdo -> query("
            SELECT CONCAT(prenom, ' ', nom) AS nomActeur
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listActors.php";
    }

    public function listGenres(){
        $pdo = Connect::seConnecter();
        $queryGenreInfo = $pdo -> query("
            SELECT nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        require "view/list/listGenres.php";
    }

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $queryRoleInfo = $pdo -> query("
            SELECT nom_role
            FROM role
            ORDER BY nom_role
        ");
        require "view/list/listRoles.php";
    }
}