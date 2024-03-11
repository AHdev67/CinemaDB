<?php
    ob_start();
    $director = $queryDirectorInfo->fetch();
    $filmography = $queryFilmography->fetchAll();
?>

<div class="container">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $director["nomRealisateur"] ?></h1>
            <span>(<?= $director["DoB"] ?>)</span>
            <p><?= $director["sexe"] ?></p>
        </div>

        <figure class="infoimg">
            <img src="" alt="photo of director">
        </figure>
    </div>

    <article>
        <h3>Biography :</h3>
        <p>
        <?= $director["biographie"] ?>
        </p>
    </article>

    <div class="filmography">
        <h3>Filmography :</h3>
    <?php
    foreach ($filmography as $f) {?>
        <div class="filmographyitem">
            <div class="movieinfomini">
                <p>
                    <?=$f["titre_film"]?>
                    , (
                    <?=$f["date"]?>
                    )
                </p>
            </div>

            <figure class="moviepostermini">
                <img src="" alt="poster film">
            </figure>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "DIRECTOR INFO";
$content= ob_get_clean();
require "view/template.php";