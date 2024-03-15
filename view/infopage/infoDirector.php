<?php
    ob_start();
    $director = $queryDirectorInfo->fetch();
    $filmography = $queryFilmography->fetchAll();
?>

<div class="container">
    
    <h1 class="mainTitle"><?= $director["nomRealisateur"] ?></h1>

    <div class="infoBox">
        <div class="info">
            <p>(<?= $director["DoB"] ?>)</p>
            <p><?= $director["sexe"] ?></p>
        </div>

        <figure class="infoImg">
            <img src="<?= $director["photo"] ?>" alt="photo of director">
        </figure>

        <article>
            <h3>Biography :</h3>
            <p>
                <?= $director["biographie"] ?>
            </p>
        </article>
    </div>

    <div class="subInfo">
        <h3>Filmography :</h3>
    <?php
    foreach ($filmography as $f) {?>
        <div class="subInfoItem">
            <div class="movieInfoMini">
                <p>
                    <a href="index.php?action=infoMovie&id=<?= $f["id_film"] ?>">
                        <b><?=$f["titre_film"]?></b>, (<?=$f["date"]?>)
                    </a>
                    
                </p>
            </div>

            <figure class="moviePosterMini">
                <a href="index.php?action=infoMovie&id=<?= $f["id_film"] ?>">
                    <img src="<?= $f["affiche"] ?>" alt="poster film">
                </a>
            </figure>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "DIRECTOR INFO";
$content= ob_get_clean();
require "view/template.php";