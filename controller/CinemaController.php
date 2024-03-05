<?php

namespace Controller;
use Model\Connect;

class CinemaController{


    //HOME PAGE

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


    // LIST OF MOVIES

    public function listMovies(){
        $pdo = Connect::seConnecter();
        $queryMovie = $pdo -> query("
            SELECT film.id_film, film.id_realisateur, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY date DESC
        ");
        require "view/list/listMovies.php";
    }


        //MOVIE INFO
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

            $queryCasting = $pdo -> prepare("
                SELECT prenom, nom, nom_role
                FROM casting
                INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_film = :id
            ");
            $queryCasting->execute(["id" => $id]);

            require "view/infopage/infoMovie.php";
        }


    //LIST OF DIRECTORS

    public function listDirectors(){
        $pdo = Connect::seConnecter();
        $queryDirector = $pdo -> query("
            SELECT realisateur.id_realisateur, realisateur.id_personne, CONCAT(prenom, ' ', nom) AS nomRealisateur
            FROM realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listDirectors.php";
    }

        //DIRECTOR INFO
        public function infoDirector($id){
            $pdo = Connect::seConnecter();
            $queryDirectorInfo = $pdo -> prepare("
                SELECT CONCAT(prenom, ' ', nom) AS nomRealisateur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB
                FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE realisateur.id_realisateur = :id
            ");
            $queryDirectorInfo->execute(["id" => $id]);

            $queryFilmography = $pdo -> prepare("
                SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, duree, note, affiche
                FROM film
                WHERE film.id_realisateur = :id
                ORDER BY date
            ");
            $queryFilmography->execute(["id" => $id]);

            require "view/infopage/infoDirector.php";
        }


    //LIST OF ACTORS

    public function listActors(){
        $pdo = Connect::seConnecter();
        $queryActor = $pdo -> query("
            SELECT acteur.id_acteur, acteur.id_personne, CONCAT(prenom, ' ', nom) AS nomActeur
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        require "view/list/listActors.php";
    }

        //ACTOR INFO
        public function infoActor($id){
            $pdo = Connect::seConnecter();
            $queryActorInfo = $pdo -> prepare("
                SELECT CONCAT(prenom, ' ', nom) AS nomActeur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB
                FROM acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                WHERE acteur.id_acteur = :id
            ");
            $queryActorInfo->execute(["id" => $id]);

            $queryFilmography = $pdo -> prepare("
                SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, nom_role
                FROM casting
                INNER JOIN film ON casting.id_film = film.id_film
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_acteur = :id
                ORDER BY date
            ");
            $queryFilmography->execute(["id" => $id]);

            require "view/infopage/infoActor.php";
        }


    //LIST OF ROLES

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $queryRole = $pdo -> query("
            SELECT role.id_role, nom_role
            FROM role
            ORDER BY nom_role
        ");
        require "view/list/listRoles.php";
    }

        //ROLE INFO
        public function infoRole($id){
            $pdo = Connect::seConnecter();
            $queryRoleInfo = $pdo -> prepare("
                SELECT nom_role
                FROM role
                WHERE role.id_role = :id
            ");
            $queryRoleInfo->execute(["id" => $id]);

            $queryRoleActor = $pdo -> prepare("
                SELECT CONCAT(prenom, ' ', nom) AS nomActeur, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM role
                INNER JOIN casting ON role.id_role = casting.id_role
                INNER JOIN film ON casting.id_film = film.id_film
                INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                WHERE role.id_role = :id
            ");
            $queryRoleActor->execute(["id" => $id]);

            require "view/infopage/infoRole.php";
        }


    //LIST OF GENRES

    public function listGenres(){
        $pdo = Connect::seConnecter();
        $queryGenre = $pdo -> query("
            SELECT genre.id_genre, nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        require "view/list/listGenres.php";
    }

    //GENRE INFO
    public function infoGenre($id){
        $pdo = Connect::seConnecter();
        $queryGenreInfo = $pdo -> prepare("
            SELECT nom_genre
            FROM genre
            WHERE genre.id_genre = :id
        ");
        $queryGenreInfo->execute(["id" => $id]);

        $queryMoviesPerGenre = $pdo -> prepare("
            SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS nomRealisateur
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            INNER JOIN categoriser ON film.id_film = categoriser.id_film
            WHERE categoriser.id_genre = :id
        ");
        $queryMoviesPerGenre->execute(["id" => $id]);

        require "view/infopage/infoGenre.php";
    }
}