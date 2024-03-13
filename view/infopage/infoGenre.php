<?php
    ob_start();
    $genre = $queryGenreInfo->fetch();
    $movies = $queryMoviesPerGenre->fetchAll();
?>

<div class="container">

    <h1 class="mainTitle"><?= $genre["nom_genre"] ?></h1>

    <div class="infoBox">
       <article>
            <h3>Deffinition :</h3>
            <p>
                <?= $genre["description_genre"] ?>
            </p>
        </article>
    </div>

    

    <div class="subInfo">
        <h3>Movies in this genre :</h3>
    <?php
    foreach ($movies as $m) {?>
        <div class="subInfoItem">
            <div class="genreinfomini">
                <p>
                    <b><?= $m["titre_film"] ?></b> (<?=$m["date"]?>), directed by <?= $m["nomRealisateur"] ?>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "GENRE INFO";
$content= ob_get_clean();
require "view/template.php";