<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    public function listMovies(){
        $pdo = Connect::seConnecter();
        $queryMovieInfo = $pdo -> query("
            SELECT titre_film, date_sortie
            FROM film
        ");

        require "view/list/listMovies.php";
    }

    public function homePage(){
        $pdo = Connect::seConnecter();
        $queryMovieDisplay = $pdo -> query("
            SELECT affiche, titre_film, date_sortie
            FROM film
        ");
        $queryPersonDisplay = $pdo -> query("
            SELECT photo, prenom, nom
            FROM personne
        ");

        require "view/homePage.php";
    }
}