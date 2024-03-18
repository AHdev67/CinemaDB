<?php

namespace Controller;
use DateTime;
use Model\Connect;

session_start();

class CinemaController{


    //HOME PAGE
    public function homePage(){
            $pdo = Connect::Connexion();
            //query : selects a movie's poster, title, release year, and director's name 
            //used for movie cards in sections 1,2 and 3 of the home page
            $queryMovieCaroussel1 = $pdo->query("
                SELECT film.id_film, affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = 4
            ");

            $queryMovieCaroussel2 = $pdo->query("
                SELECT film.id_film, affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = 9
            ");

            $queryMovieCaroussel3 = $pdo->query("
                SELECT film.id_film, affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = 3
            ");

            $queryMovieLatest = $pdo->query("
                SELECT film.id_film, affiche, titre_film, date_sortie, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                GROUP BY film.id_film
                HAVING date_sortie >= ALL(
                    SELECT date_sortie
                    FROM film
                );
            ");

            $queryMovieChoice = $pdo->query("
                SELECT film.id_film, affiche, titre_film, date_sortie, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = 7
            ");
            //query : selects surname and name of any given person
            //used for person cards in sections 4 and 5 of the home page
            $queryActorCard = $pdo->query("
                SELECT acteur.id_acteur, photo, CONCAT(prenom, ' ', nom) AS actorName, MAX(film.date_sortie) AS filmRecent
                FROM personne
                INNER JOIN acteur ON personne.id_personne = acteur.id_personne
                INNER JOIN casting ON acteur.id_acteur = casting.id_acteur
                INNER JOIN film ON casting.id_film = film.id_film
                GROUP BY acteur.id_acteur
                ORDER BY filmRecent DESC
                LIMIT 3
            ");

            $queryDirectorCard = $pdo->query("
                SELECT realisateur.id_realisateur, photo, CONCAT(prenom, ' ', nom) AS directorName, MAX(film.date_sortie) AS filmRecent
                FROM personne
                INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
                INNER JOIN film ON realisateur.id_realisateur = film.id_realisateur
                GROUP BY realisateur.id_realisateur
                ORDER BY filmRecent DESC
                LIMIT 3
            ");

            require "view/homePage.php";
        }

//-------------------------------------MOVIES-------------------------------------------

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
                SELECT film.id_film, film.id_realisateur, titre_film, date_sortie, DATE_FORMAT (date_sortie, '%m/%d/%Y') as date, CONCAT(prenom, ' ', nom) AS realisateurFilm, duree, note, affiche, synopsis
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = :id
            ");
            $queryMovieInfo->execute(["id" => $id]);

            //query : selects person's surname, name, and name of role they played in a given movie
            // used to display movie's casting
            $queryCasting = $pdo -> prepare("
                SELECT casting.id_acteur, casting.id_role, CONCAT(prenom, ' ', nom) AS nomActeur, nom_role
                FROM casting
                INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_film = :id
            ");
            $queryCasting->execute(["id" => $id]);
            require "view/infopage/infoMovie.php";
        }

        //MODIFIY MOVIE
        public function modMovieDisplay($id){
            $pdo = Connect::Connexion();
            $queryModForm = $pdo -> prepare("
                SELECT film.id_film, titre_film, date_sortie, duree, synopsis, note, affiche, CONCAT(prenom, ' ', nom) AS realisateurFilm, film.id_realisateur
                FROM film
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE film.id_film = :id
            ");

            $queryMovieCategorization = $pdo -> prepare("
                SELECT categoriser.id_genre
                FROM categoriser
                WHERE categoriser.id_film = :id
            ");

            $queryInputDirector = $pdo -> query("
                SELECT realisateur.id_realisateur, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                ORDER BY nom
            ");
         
            $queryInputGenre = $pdo -> query("
                SELECT genre.id_genre, nom_genre
                FROM genre
                ORDER BY nom_genre
            ");

            $queryThisCasting = $pdo -> prepare("
                SELECT casting.id_acteur, casting.id_role, CONCAT(prenom, ' ', nom) AS nomActeur, nom_role
                FROM casting
                INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_film = :id
            ");

            $queryModForm->execute(["id" => $id]);
            $queryMovieCategorization->execute(["id" => $id]);
            $queryThisCasting->execute(["id" => $id]);

            require "view/modpage/modMovie.php";
        }

        public function submitUpdateMovie($id){
            if(isset($_POST['submitUpdate'])) {
                $pdo = Connect::Connexion();

                //sanitizing string inputs to avoid XSS vulnerability

                //mandatory fields
                $title = filter_input(INPUT_POST,"inputTile", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $director = $_POST["inputDirector"];
                //converting retrieved release date as string to datetime
                $date = new \DateTime(filter_input(INPUT_POST,"inputReleaseDate", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $duration = filter_input(INPUT_POST,"inputDuration", FILTER_VALIDATE_INT);
                $score = $_POST["inputScore"];

                //optional fields
                $synopsis = filter_input(INPUT_POST,"inputSynopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $poster = filter_input(INPUT_POST,"inputPoster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $querySubmitMovieUpdate = $pdo->prepare("
                    UPDATE film 
                    SET 
                        titre_film = :title,
                        date_sortie = :date,
                        duree = :duration,
                        note = :score,
                        synopsis = :synopsis,
                        affiche = :poster,
                        id_realisateur = :director
                    WHERE film.id_film = :id
                ");

                $querySubmitMovieUpdate->execute([
                    "title" => $title,
                    "date" => $date->format("Y-m-d"),
                    "duration" => $duration,
                    "score" => $score,
                    "synopsis" => $synopsis,
                    "poster" => $poster,
                    "director" => $director,
                    "id" => $id
                ]);

                $queryClearMovieGenres = $pdo->prepare("
                    DELETE FROM categoriser
                    WHERE categoriser.id_film = :id
                ");

                $queryClearMovieGenres -> execute([
                    "id" => $id
                ]);


                foreach($_POST as $name =>$value){
                     
                    if (str_contains($name, "inputGenre")){ // s'il y a inputGenre dans le nom de la clef
                        $genre = $value;
                        $queryCategorizeMovie = $pdo -> prepare("
                        INSERT INTO categoriser (id_film, id_genre)
                        VALUES (:movieId, :genreId)
                        ");
                        $queryCategorizeMovie->execute([
                        "movieId"=> $id,
                        "genreId"=> $genre
                        ]);
                    }
                }
                header("Location:index.php?action=infoMovie&id=$id");
            }
        }

        //ADD MOVIE
        public function addMovieDisplay(){
            $pdo = Connect::Connexion();
            //query : selects full name of director
            //used for displaying list of director as select options in add movie form
            $queryInputDirector = $pdo -> query("
                SELECT realisateur.id_realisateur, CONCAT(prenom, ' ', nom) AS realisateurFilm
                FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                ORDER BY nom
            ");
            //query : selects name of genre
            //used for displaying list of genres as checkboxes in add movie form
            $queryInputGenre = $pdo -> query("
                SELECT genre.id_genre, nom_genre
                FROM genre
                ORDER BY nom_genre
            ");

            require "view/addPage/addMovie.php";
        }

            //ADD CASTING
            public function addCastingDisplay($id){
                $pdo = Connect::Connexion();

                $queryInputActor = $pdo->query("
                    SELECT acteur.id_acteur, CONCAT(prenom, ' ', nom) AS nomActeur
                    FROM personne
                    INNER JOIN acteur ON personne.id_personne = acteur.id_personne
                    ORDER BY nomActeur
                ");

                $queryInputRole = $pdo->query("
                    SELECT role.id_role, nom_role
                    FROM role
                ");

                $queryCasting = $pdo -> prepare("
                SELECT casting.id_acteur, casting.id_role, CONCAT(prenom, ' ', nom) AS nomActeur, nom_role
                FROM casting
                INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_film = :id
                ");
                $queryCasting->execute(["id" => $id]);
            
                require "view/addPage/addCasting.php";
            }

            public function submitCasting($id){
                if(isset($_POST['submitForm'])){
                    $pdo = Connect::Connexion();

                    $actor = $_POST["inputActor"];
                    $role = $_POST["inputRole"];

                    $querySubmitCasting = $pdo -> prepare("
                    INSERT INTO casting (id_film, id_acteur, id_role)
                    VALUES (:idFilm, :idActeur, :idRole)
                    ");
                    try {
                        $querySubmitCasting->execute([
                            "idFilm" => $id,
                            "idActeur" => $actor,
                            "idRole" => $role
                        ]);
                    }
                    catch(\PDOException $ex){

                    }
                }

                header("Location:index.php?action=addCastingDisplay&id=$id");
            }

            public function deleteCasting($id){
                $ids = explode(",",$id);
                $movieId = $ids[0];
                $actorId = $ids[1];
                $roleId = $ids[2];
                
                $pdo = Connect::Connexion();
                $queryDeleteCasting = $pdo -> prepare("
                DELETE FROM casting
                WHERE casting.id_film = :movieId AND casting.id_acteur = :actorId AND casting.id_role = :roleId
                ");

                $queryDeleteCasting -> execute([
                    "movieId" => $movieId,
                    "actorId"=> $actorId,
                    "roleId" => $roleId
                ]);
                
                header("Location:index.php?action=addCastingDisplay&id=$movieId");
            }


        public function submitMovie() {
            if(isset($_POST['submitForm'])) {
                $pdo = Connect::Connexion();

                //sanitizing string inputs to avoid XSS vulnerability

                //mandatory fields
                $title = filter_input(INPUT_POST,"inputTile", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $director = $_POST["inputDirector"];
                //converting retrieved release date as string to datetime
                $date = new \DateTime(filter_input(INPUT_POST,"inputReleaseDate", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $duration = filter_input(INPUT_POST,"inputDuration", FILTER_VALIDATE_INT);
                $score = $_POST["inputScore"];

                //optional fields
                $synopsis = filter_input(INPUT_POST,"inputSynopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $poster = filter_input(INPUT_POST,"inputPoster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $querySubmitMovie = $pdo -> prepare("
                    INSERT INTO film (titre_film, date_sortie, duree, note, synopsis, affiche, id_realisateur)
                    VALUES (:title, :date, :duration, :score, :synopsis, :poster, :director)
                ");

                $querySubmitMovie->execute([
                    "title"=> $title,
                    "date"=> $date->format("Y-m-d"),
                    "duration"=> $duration,
                    "score"=>$score,
                    "synopsis"=> $synopsis,
                    "poster"=> $poster,
                    "director"=> $director
                ]);

                $movieId = $pdo->lastInsertId();

                foreach($_POST as $name =>$value){
                     
                    if (str_contains($name, "inputGenre")){ // s'il y a inputGenre dans le nom de la clef
                    $genre = $value;
                    $queryCategorizeMovie = $pdo -> prepare("
                    INSERT INTO categoriser (id_film, id_genre)
                    VALUES (:movieId, :genreId)
                    ");
                    $queryCategorizeMovie->execute([
                        "movieId"=> $movieId,
                        "genreId"=> $genre
                    ]);
                    }
                }
                
                header("Location:index.php?action=listMovies");
            }
        }

        public function deleteMovie($id){
            $pdo = Connect::Connexion();
            $queryDeleteMovie = $pdo->prepare("
                 DELETE FROM film
                 WHERE film.id_film = :id
            ");

            $queryDeleteMovie -> execute([
                "id" => $id
            ]);

            header("Location:index.php?action=listMovies");
        }

//-------------------------------------DIRECTORS-------------------------------------------

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
                SELECT realisateur.id_realisateur, photo, CONCAT(prenom, ' ', nom) AS nomRealisateur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB, biographie
                FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne
                WHERE realisateur.id_realisateur = :id
            ");
            $queryDirectorInfo->execute(["id" => $id]);

            //query : selects movie's title, release year, duration, score, poster
            //used to display director's filmography
            $queryFilmography = $pdo -> prepare("
                SELECT film.id_film, affiche, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, duree, note, affiche
                FROM film
                WHERE film.id_realisateur = :id
                ORDER BY date
            ");
            $queryFilmography->execute(["id" => $id]);
            require "view/infopage/infoDirector.php";
        }

        //ADD DIRECTOR
        public function addDirectorDisplay(){
            require "view/addPage/addDirector.php";
        }

        public function submitDirector() {
            if(isset($_POST['submitForm'])) {
                $pdo = Connect::Connexion();

                //sanitizing string inputs to avoid XSS vulnerability

                //mandatory fields
                $firstname = filter_input(INPUT_POST,"inputFirstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lastname = filter_input(INPUT_POST,"inputLastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                //converting retrieved release date as string to datetime
                $DoB = new \DateTime(filter_input(INPUT_POST,"inputDoB", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $sex = filter_input(INPUT_POST,"inputSex", FILTER_VALIDATE_INT);
                
                //optional fields
                $photo = filter_input(INPUT_POST,"inputPhoto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $biography = filter_input(INPUT_POST,"inputBiography", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $querySubmitDirector = $pdo -> prepare("
                    INSERT INTO personne (prenom, nom, date_naissance, sexe, biographie, photo)
                    VALUES (:firstname, :lastname, :dateOfBirth, :sex, :biography, :photo)
                ");

                $querySubmitDirector->execute([
                    "firstname"=> $firstname,
                    "lastname"=> $lastname->format("Y-m-d"),
                    "dateOfBirth"=> $DoB,
                    "sex"=>$sex,
                    "biography"=> $biography,
                    "photo"=> $photo
                ]);

                $DirectorId = $pdo->lastInsertId();

                $queryCategorizeDirector = $pdo -> prepare("
                    INSERT INTO realisateur (id_personne)
                    VALUES (:DirectorId)
                    ");

                $queryCategorizeDirector->execute([
                    "DirectorId"=> $DirectorId,
                    ]);
                
                header("Location:index.php?action=listDirectors");
            }
        }

//-------------------------------------ACTORS-------------------------------------------

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
                SELECT acteur.id_acteur, photo, CONCAT(prenom, ' ', nom) AS nomActeur, sexe, DATE_FORMAT (date_naissance, '%m/%d/%Y') AS DoB, biographie
                FROM acteur
                INNER JOIN personne ON acteur.id_personne = personne.id_personne
                WHERE acteur.id_acteur = :id
            ");
            $queryActorInfo->execute(["id" => $id]);

            //query : selects movie's title, release year and role played by the actor
            //used to display actor's filmography
            $queryFilmography = $pdo -> prepare("
                SELECT casting.id_film, casting.id_role, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, nom_role
                FROM casting
                INNER JOIN film ON casting.id_film = film.id_film
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_acteur = :id
                ORDER BY date
            ");
            $queryFilmography->execute(["id" => $id]);
            require "view/infopage/infoActor.php";
        }

        //ADD ACTOR
        public function addActorDisplay(){
            require "view/addPage/addActor.php";
        }

        public function submitActor() {
            if(isset($_POST['submitForm'])) {
                $pdo = Connect::Connexion();

                //sanitizing string inputs to avoid XSS vulnerability

                //mandatory fields
                $firstname = filter_input(INPUT_POST,"inputFirstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lastname = filter_input(INPUT_POST,"inputLastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                //converting retrieved release date as string to datetime
                $DoB = new \DateTime(filter_input(INPUT_POST,"inputDoB", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $sex = filter_input(INPUT_POST,"inputSex", FILTER_VALIDATE_INT);
                
                //optional fields
                $photo = filter_input(INPUT_POST,"inputPhoto", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $biography = filter_input(INPUT_POST,"inputBiography", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $querySubmitActor = $pdo -> prepare("
                    INSERT INTO personne (prenom, nom, date_naissance, sexe, biographie, photo)
                    VALUES (:firstname, :lastname, :dateOfBirth, :sex, :biography, :photo)
                ");

                $querySubmitActor->execute([
                    "firstname"=> $firstname,
                    "lastname"=> $lastname->format("Y-m-d"),
                    "dateOfBirth"=> $DoB,
                    "sex"=>$sex,
                    "biography"=> $biography,
                    "photo"=> $photo
                ]);

                $ActorId = $pdo->lastInsertId();

                $queryCategorizeActor = $pdo -> prepare("
                    INSERT INTO acteur (id_personne)
                    VALUES (:ActorId)
                    ");

                $queryCategorizeActor->execute([
                    "ActorId"=> $ActorId,
                    ]);
                
                header("Location:index.php?action=listActors");
            }
        }

//-------------------------------------ROLES-------------------------------------------

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
                SELECT casting.id_acteur, film.id_film, CONCAT(prenom, ' ', nom) AS nomActeur, titre_film, DATE_FORMAT (date_sortie, '%Y') as date
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

        //ADD ROLE
        public function addRoleDisplay(){
            require "view/addPage/addRole.php";
        }

        public function submitRole() {
            if(isset($_POST['submitForm'])) {
                $pdo = Connect::Connexion();

                //sanitizing string inputs to avoid XSS vulnerability

                //mandatory fields
                $rolename = filter_input(INPUT_POST,"inputFirstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                //optional fields
                $roledesc = filter_input(INPUT_POST,"inputLastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $querySubmitRole = $pdo -> prepare("
                    INSERT INTO role (nom_role, description_role)
                    VALUES (:rolename, :roledesc)
                ");

                $querySubmitRole->execute([
                    "rolename"=> $rolename,
                    "roledesc"=> $roledesc
                ]);
                
                header("Location:index.php?action=listRoles");
            }
        }

//-------------------------------------GENRES-------------------------------------------

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
                SELECT film.id_film, film.id_realisateur, titre_film, DATE_FORMAT (date_sortie, '%Y') as date, CONCAT(prenom, ' ', nom) AS nomRealisateur
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