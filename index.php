<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

if(isset($_GET["action"])){

    switch($_GET["action"]){

        case "homePage" :
            $ctrlCinema-> homePage();
            break;

        case "listDirectors" :
            $ctrlCinema -> listDirectors();
            break;   

        case "listActors" :
                $ctrlCinema -> listActors();
                break;

        case "listMovies" :
            $ctrlCinema -> listMovies();
            break;

        case "listGenres" :
            $ctrlCinema -> listGenres();
            break;

        case "listRoles" :
            $ctrlCinema -> listRoles();
            break;
    }
} else {
    $ctrlCinema-> homePage();
}