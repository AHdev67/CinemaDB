<?php
    ob_start();
    $movie = $queryMovieInfo->fetch();
    $casting = $queryCasting->fetchAll();
?>

<div class="container">

    <h1 class="mainTitle"><?= $movie["titre_film"] ?></h1>
    
    <div class="infoBox">
        <div class="info">
            <p>
                Directed by : <?= $movie["realisateurFilm"] ?>
            </p>

            <p>
                Release date : <?= $movie["date"] ?>
            </p>

            <p>
                Duration : <?= $movie["duree"] ?> minutes
            </p>

            <p>
                Score : <?= $movie["note"] ?>
            </p>
        </div>

        <figure class="infoImg">
            <img src="<?= $movie["affiche"] ?>" alt="movie poster">
        </figure>

        <article>
            <h3>Synopsis :</h3>
            <p>
                <?= $movie["synopsis"] ?>
            </p>
        </article>
    </div>

    <div class="subInfo">
        <h3>Casting :</h3>
    <?php
    foreach ($casting as $c) {?>
        <div class="subInfoItem">
            <div class="actorinfomini">
                <figure class="actorphotomini">
                    <img src="" alt="photo acteur">
                </figure>

                <p>
                    <b><?=$c["nomActeur"]?></b>
                </p>

                <p>
                    In the role of : <?=$c["nom_role"]?>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "MOVIE INFO";
$content= ob_get_clean();
require "view/template.php";