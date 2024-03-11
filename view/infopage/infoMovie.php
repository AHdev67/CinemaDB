<?php
    ob_start();
    $movie = $queryMovieInfo->fetch();
    $casting = $queryCasting->fetchAll();
?>

<div class="container">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $movie["titre_film"] ?></h1>
            <span>(<?= $movie["date"] ?>)</span>
            <p>
                Directed by :
                <?= $movie["realisateurFilm"] ?>
            </p>

            <p>
                Duration :
                <?= $movie["duree"] ?>
            </p>

            <p>
                Score :
                <?= $movie["note"] ?>
            </p>
        </div>

        <figure class="infoimg">
            <img src="<?= $movie["affiche"] ?>" alt="">
        </figure>
    </div>

    <article>
        <h3>Synopsis :</h3>
        <p>
            <?= $movie["synopsis"] ?>
        </p>
    </article>

    <div class="casting">
        <h3>Casting :</h3>
    <?php
    foreach ($casting as $c) {?>
        <div class="castingitem">
            <div class="actorinfomini">
                <p>
                    <?=$c["prenom"]?>
                    <?=$c["nom"]?>
                </p>
                
                <p>
                    , playing : <?=$c["nom_role"]?>
                </p>
            </div>

            <figure class="actorphotomini">
                <img src="" alt="photo acteur">
            </figure>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "MOVIE INFO";
$content= ob_get_clean();
require "view/template.php";