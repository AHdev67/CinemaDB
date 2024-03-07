<?php
    ob_start();
    $genre = $queryGenreInfo->fetch();
    $movies = $queryMoviesPerGenre->fetchAll();
?>

<div class="wrapper">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $genre["nom_genre"] ?></h1>
        </div>
    </div>

    <article>
        <h3>Deffinition :</h3>
        <p>
            <?= $genre["description_genre"] ?>
        </p>
    </article>

    <div class="movies">
        <h3>Movies in this genre :</h3>
    <?php
    foreach ($movies as $m) {?>
        <div class="movielist">
            <div class="genreinfomini">
                <p>
                <?= $m["titre_film"] ?> (<?=$m["date"]?>), directed by <?= $m["nomRealisateur"] ?>
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