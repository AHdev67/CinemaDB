<?php
    ob_start();
    $movie = $queryMovieInfo->fetch();
?>

<div class="container">

    <div class="infoHeader">
        <h1 class="mainTitle"><?= $movie["titre_film"] ?></h1>

        <div class="options">
            <a href="index.php?action=modMovieDisplay&id=<?= $movie["id_film"]?>">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <a href="index.php?action=deleteMovie&id=<?= $movie["id_film"]?>" class="delete">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>
    
    
    <div class="infoBox">
        <div class="infoTop">
            <div class="info">
                <p>
                    Directed by : 
                    <a href="index.php?action=infoDirector&id=<?= $movie["id_realisateur"]?>">
                        <?= $movie["realisateurFilm"] ?>
                    </a>
                </p>

                <p>
                    Release date : <?= $movie["date"] ?>
                </p>

                <p>
                    Duration : <?= $movie["duree"] ?> minutes
                </p>

                <p>
                    Score : <?= $movie["note"] ?>/5
                </p>

                <div class="genresList">
                    <span>Genre(s) : </span>
                    <ul>
                        <?php
                        foreach($queryGenres->fetchAll() as $genre){ ?>
                            <li><?= $genre["nom_genre"] ?> </li>
                        <?php }?>  
                    </ul>
                </div>
            </div>

            <figure class="infoImg">
                <img src="<?= $movie["affiche"] ?>" alt="movie poster">
            </figure>
        </div>

        <article>
            <h3>Synopsis :</h3>
            <p>
                <?= $movie["synopsis"] ?>
            </p>
        </article>
    </div>

    <div class="subInfo">
        <div class="subInfoHeader">
            <h3>Casting :</h3>

            <a href="index.php?action=addCastingDisplay&id=<?= $movie["id_film"] ?>">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </div>
    
        <div class="subInfoContent">

        <?php
        foreach ($queryCasting->fetchAll() as $c) {?>
            <div class="subInfoItem">
                <div class="actorinfomini">
                    <figure class="actorphotomini">
                        <img src="" alt="photo acteur">
                    </figure>

                    <p>
                        <a href="index.php?action=infoActor&id=<?= $c["id_acteur"] ?>">
                            <b><?=$c["nomActeur"]?></b>
                        </a>
                    </p>

                    <p>
                        In the role of : 
                        <a href="index.php?action=infoRole&id=<?= $c["id_role"] ?>">
                            <?=$c["nom_role"]?>
                        </a>
                    </p>
                </div>
            </div>
        <?php } ?>
        </div>

    </div>

</div>

<?php

$title= "MOVIE INFO";
$content= ob_get_clean();
$description= "Information on".$movie['titre_film'].", by".$movie['realisateurFilm'].".";
require "view/template.php";