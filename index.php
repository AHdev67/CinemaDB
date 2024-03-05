<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
//verify that id exists, if not, set to null
$id = (isset($_GET["id"]) ? $_GET["id"] : null);

if(isset($_GET["action"])){

    //switch for every redirect action
    switch($_GET["action"]){

        case "homePage" :
            $ctrlCinema-> homePage();
            break;

        case "listMovies" :
            $ctrlCinema -> listMovies();
            break;

            case "infoMovie" :
                $ctrlCinema -> infoMovie($id);
                break;

        case "listDirectors" :
            $ctrlCinema -> listDirectors();
            break;   

            case "infoDirector" :
                $ctrlCinema -> infoDirector($id);
                break;

        case "listActors" :
            $ctrlCinema -> listActors();
            break;

            case "infoActor" :
                $ctrlCinema -> infoActor($id);
                break;

        case "listRoles" :
            $ctrlCinema -> listRoles();
            break;

            case "infoRole" :
                $ctrlCinema -> infoRole($id);
                break;

        case "listGenres" :
            $ctrlCinema -> listGenres();
            break;

            case "infoGenre" :
                $ctrlCinema -> infoGenre($id);
                break;

    }
} 
//by default when connecting to site, display home page
else {
    $ctrlCinema-> homePage();
}