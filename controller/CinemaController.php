<?php

namespace Controller;
use Model\Connect;

class CinemaController{


    //HOME PAGE
    public function homePage(){
            $pdo = Connect::Connexion();
            //query : selects a movie's poster, title, release year, and director's name 
            //used for movie cards in sections 1,2 and 3 of the home page
            $queryMovieCard = $pdo -> query("
                SELECT affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ");
            //query : selects surname and name of any given person
            //used for person cards in sections 4 and 5 of the home page
            $queryPersonCard = $pdo -> query("
                SELECT prenom, nom
                FROM personne
            ");

            require "view/homePage.php";
        }


    // LIST OF MOVIES
    public function listMovies(){
        $pdo = Connect::Connexion();
        //query : selects a movie's title, release year, and the full name of the director (also selects both movie's id and director's id from film table to compare to id passed in redirect)
        //used to list movies in movies list
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
            $pdo = Connect::Connexion();
            //query : selects movie's title, release year, full name of director, duration, score, poster and synopsis
            //used to display movie's info in infoMovie page
            $queryMovieInfo = $pdo -> prepare("
                SELECT titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm, duree, note, affiche, synopsis
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = :id
            ");
            $queryMovieInfo->execute(["id" => $id]);

            //query : selects person's surname, name, and name of role they played in a given movie
            // used to display movie's casting
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

        public function addMovieDisplay(){
            require "view/addPage/addMovie.php";
        }

        public function addMovieTreatment($id){
            
        }


    //LIST OF DIRECTORS
    public function listDirectors(){
        $pdo = Connect::Connexion();
        //query : selects director's full name (also director's id for redirects)
        //used to list directors in directors list
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
            $pdo = Connect::Connexion();
            //query : selects director's full name, date of birth, and biography
            //used to display director's info
            $queryDirectorInfo = $pdo -> prepare("
                SELECT CONCAT(prenom, ' ', nom) AS nomRealisateur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB, biographie
                FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE realisateur.id_realisateur = :id
            ");
            $queryDirectorInfo->execute(["id" => $id]);

            //query : selects movie's title, release year, duration, score, poster
            //used to display director's filmography
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
        $pdo = Connect::Connexion();
        //query : selects actor's full name (also actor's id for redirects)
        //used to list actors in actors list
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
            $pdo = Connect::Connexion();
            //query : selects actor's full name, date of birth and biography
            //used to display actor's info
            $queryActorInfo = $pdo -> prepare("
                SELECT CONCAT(prenom, ' ', nom) AS nomActeur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB, biographie
                FROM acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                WHERE acteur.id_acteur = :id
            ");
            $queryActorInfo->execute(["id" => $id]);

            //query : selects movie's title, release year and role played by the actor
            //used to display actor's filmography
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
        $pdo = Connect::Connexion();
        //query : selects role's name (also role's id for redirects)
        //used to list roles in roles list
        $queryRole = $pdo -> query("
            SELECT role.id_role, nom_role
            FROM role
            ORDER BY nom_role
        ");
        require "view/list/listRoles.php";
    }

        //ROLE INFO
        public function infoRole($id){
            $pdo = Connect::Connexion();
            //query : selects role's name and description
            //used to display role's info
            $queryRoleInfo = $pdo -> prepare("
                SELECT nom_role, description_role
                FROM role
                WHERE role.id_role = :id
            ");
            $queryRoleInfo->execute(["id" => $id]);

            //query : selects actor's full name, movie's title, release year and director's name
            //used to display all actors having played that role, and the movie they played it in
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
        $pdo = Connect::Connexion();
        //query : selects genre's name (also genre's id for redirects)
        //used to list genres in genres list
        $queryGenre = $pdo -> query("
            SELECT genre.id_genre, nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        require "view/list/listGenres.php";
    }

        //GENRE INFO
        public function infoGenre($id){
            $pdo = Connect::Connexion();
            //query : selects genre's name and description
            //used to display genre's info
            $queryGenreInfo = $pdo -> prepare("
                SELECT nom_genre, description_genre
                FROM genre
                WHERE genre.id_genre = :id
            ");
            $queryGenreInfo->execute(["id" => $id]);

            //query : selects movie's title, release year and director's full name
            //used to display all movies belonging to that genre
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