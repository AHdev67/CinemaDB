<?php
    ob_start();
    $actor = $queryActorInfo->fetch();
    $filmography = $queryFilmography->fetchAll();
?>

<div class="container">

    <div class="infoHeader">
        <h1 class="mainTitle"><?= $actor["nomActeur"] ?></h1>

        <div class="options">
            <a href="index.php?action=deleteActor&id=<?= $actor["id_acteur"]?>" class="delete">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>
    
    <div class="infoBox">
        <div class="infoTop">
            <div class="info">
                <p>Date of birth : (<?= $actor["DoB"] ?>)</p>
            </div>

            <figure class="infoImg">
                <img src="<?= $actor["photo"] ?>" alt="photo of actor">
            </figure>
        </div>

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
                    <a href="index.php?action=infoMovie&id=<?= $f["id_film"] ?>">
                        <b><?=$f["titre_film"]?></b> (<?=$f["date"]?>)
                    </a>
                    , playing : 
                    <a href="index.php?action=infoRole&id=<?= $f["id_role"] ?>">
                        <?=$f["nom_role"]?>
                    </a>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "ACTOR INFO";
$content= ob_get_clean();
$description= "Information on ".$actor['nomActeur'].".";
require "view/template.php";