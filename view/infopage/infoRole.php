<?php
    ob_start();
    $role = $queryRoleInfo->fetch();
    $roleActeur = $queryRoleActor->fetchAll();
?>

<div class="container">

    <div class="infoHeader">
        <h1 class="mainTitle"><?= $role["nom_role"] ?></h1>

        <div class="options">
            <a href="index.php?action=deleteRole&id=<?= $role["id_role"]?>" class="delete">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>

    <div class="infoBox">

         <article>
            <h3>Character :</h3>
            <p>
                <?= $role["description_role"] ?>
            </p>
        </article>

    </div>

    <div class="subInfo">
        <h3>Played by :</h3>
    <?php
    foreach ($roleActeur as $r) {?>
        <div class="subInfoItem">
            <div class="roleInfoMini">
                <p>
                    <a href="index.php?action=infoActor&id=<?= $r["id_acteur"] ?>">
                        <b><?= $r["nomActeur"] ?></b> 
                    </a>
                    in : 
                    <a href="index.php?action=infoMovie&id=<?= $r["id_film"] ?>">
                        <?=$r["titre_film"]?>, (<?=$r["date"]?>)
                    </a>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>

<?php

$title= "ROLE INFO";
$content= ob_get_clean();
require "view/template.php";