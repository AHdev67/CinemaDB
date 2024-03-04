<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    //function to call necessary data from DB when loading home page
    public function homePage(){
            $pdo = Connect::seConnecter();
            $queryMovieDiscover = $pdo -> query("
                SELECT affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                LIMIT 1
            ");
            $queryPerson = $pdo -> query("
                SELECT prenom, nom
                FROM personne
            ");

            require "view/homePage.php";
        }

    //function for movies list page, selects movie id for redirecting to correct movie info page, title, release year and director name for display
    public function listMovies(){
        $pdo = Connect::seConnecter();
        $queryMovieInfo = $pdo -> query("
            SELECT id_film, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY date DESC
        ");
        require "view/list/listMovies.php";
    }

    //function for directors list page, selects director id for redirect to info, name for display
    public function listDirectors(){
        $pdo = Connect::seConnecter();
        $queryDirectorInfo = $pdo -> query("
            SELECT realisateur.id_personne, CONCAT(prenom, ' ', nom) AS nomRealisateur
            FROM realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listDirectors.php";
    }

    //function for actors list page, selects actor id for redirect to info, name for display
    public function listActors(){
        $pdo = Connect::seConnecter();
        $queryActorInfo = $pdo -> query("
            SELECT acteur.id_personne, CONCAT(prenom, ' ', nom) AS nomActeur
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listActors.php";
    }

    //function for genres list page, same thing as before but for genre
    public function listGenres(){
        $pdo = Connect::seConnecter();
        $queryGenreInfo = $pdo -> query("
            SELECT id_genre, nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        require "view/list/listGenres.php";
    }

    //you get it by now
    public function listRoles(){
        $pdo = Connect::seConnecter();
        $queryRoleInfo = $pdo -> query("
            SELECT nom_role
            FROM role
            ORDER BY nom_role
        ");
        require "view/list/listRoles.php";
    }

    //function for movie info page, selects from film table the overall info of the film, plus the poster, then selects the movie's casting.
    public function infoMovie($id){
        $pdo = Connect::seConnecter();
        $queryMovieInfo = $pdo -> prepare("
            SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm, duree, note, affiche
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            WHERE film.id_film = :id
        ");
        $queryMovieInfo->execute(["id" => $id]);

        $reqCasting = $pdo -> prepare("
            SELECT prenom, nom, nom_role
            FROM casting
        ");
        $reqCasting->execute(["id" => $id]);

        require "view/infopage/infoMovie.php";
    }
}
