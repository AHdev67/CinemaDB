<?php
    ob_start();
    $actor = $queryActorInfo->fetch();
    $filmography = $queryFilmography->fetchAll();
?>

<div class="wrapper">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $actor["nomActeur"] ?></h1>
            <span>(<?= $actor["DoB"] ?>)</span>
            <p><?= $actor["sexe"] ?></p>
        </div>

        <figure class="infoimg">
            <img src="" alt="photo of actor">
        </figure>
    </div>

    <article>
        <h3>Biography :</h3>
        <p>
        <?= $actor["biographie"] ?>
        </p>
    </article>

    <div class="filmography">
        <h3>Filmography :</h3>
    <?php
    foreach ($filmography as $f) {?>
        <div class="filmographyitem">
            <div class="movieinfomini">
                <p>
                    <?=$f["titre_film"]?>, (<?=$f["date"]?>), playing : <?=$f["nom_role"]?>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "ACTOR INFO";
$content= ob_get_clean();
require "view/template.php";