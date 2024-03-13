<?php
    ob_start();
    $actor = $queryActorInfo->fetch();
    $filmography = $queryFilmography->fetchAll();
?>

<div class="container">

    <h1 class="mainTitle"><?= $actor["nomActeur"] ?></h1>
    
    <div class="infoBox">
        <div class="info">
            <p>(<?= $actor["DoB"] ?>)</p>
            <p><?= $actor["sexe"] ?></p>
        </div>

        <figure class="infoImg">
            <img src="<?= $actor["photo"] ?>" alt="photo of actor">
        </figure>

         <article>
            <h3>Biography :</h3>
            <p>
            <?= $actor["biographie"] ?>
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
                    <b><?=$f["titre_film"]?></b> (<?=$f["date"]?>), playing : <?=$f["nom_role"]?>
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