<?php

use Controller\CinemaController;

//autoloader for any class bearing the same name as their file
spl_autoload_register(function ($class_name) {
    //utilizing include to avoid nuking whole code in case of error
    require str_replace("\\", DIRECTORY_SEPARATOR, $class_name) . '.php';
    // include $class_name . '.php';
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
        
//--------------------------------MOVIES-----------------------------------
        case "listMovies" :
            $ctrlCinema -> listMovies();
            break;
            
            case "infoMovie" :
                $ctrlCinema -> infoMovie($id);
                break;

                case "modMovieDisplay" :
                    $ctrlCinema -> modMovieDisplay($id);
                    break;
                
                case "submitUpdateMovie" :
                        $ctrlCinema -> submitUpdateMovie($id);
                        break;
            
                case "addMovieDisplay" :
                    $ctrlCinema -> addMovieDisplay();
                    break;
                
                case "submitMovie" :
                    $ctrlCinema -> submitMovie();
                    break;

                case "addCastingDisplay" :
                    $ctrlCinema -> addCastingDisplay($id);
                    break;
                
                case "submitCasting" :
                    $ctrlCinema -> submitCasting($id);
                    break;

                case "deleteCasting" :
                    $ctrlCinema -> deleteCasting($id);
                    break;

                case "deleteMovie" :
                    $ctrlCinema -> deleteMovie($id);
                    break;

//--------------------------------DIRECTORS-----------------------------------
        case "listDirectors" :
            $ctrlCinema -> listDirectors();
            break;   

            case "infoDirector" :
                $ctrlCinema -> infoDirector($id);
                break;

                case "addDirectorDisplay" :
                    $ctrlCinema -> addDirectorDisplay();
                    break;
                
                case "submitDirector" :
                    $ctrlCinema -> submitDirector();
                    break;
                
                case "deleteDirector" :
                    $ctrlCinema -> deleteDirector($id);
                    break;

//--------------------------------ACTORS-----------------------------------
        case "listActors" :
            $ctrlCinema -> listActors();
            break;

            case "infoActor" :
                $ctrlCinema -> infoActor($id);
                break;

                case "addActorDisplay" :
                    $ctrlCinema -> addActorDisplay();
                    break;
                
                case "submitActor" :
                    $ctrlCinema -> submitActor();
                    break;

                case "deleteActor" :
                    $ctrlCinema -> deleteActor($id);
                    break;

//--------------------------------ROLES-----------------------------------
        case "listRoles" :
            $ctrlCinema -> listRoles();
            break;

            case "infoRole" :
                $ctrlCinema -> infoRole($id);
                break;

                case "addRoleDisplay" :
                    $ctrlCinema -> addRoleDisplay();
                    break;
                
                case "submitRole" :
                    $ctrlCinema -> submitRole();
                    break;

                case "deleteRole" :
                    $ctrlCinema -> deleteRole($id);
                    break;

//--------------------------------GENRES-----------------------------------
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