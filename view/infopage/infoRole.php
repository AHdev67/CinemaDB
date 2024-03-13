<?php
    ob_start();
    $role = $queryRoleInfo->fetch();
    $roleActeur = $queryRoleActor->fetchAll();
?>

<div class="container">

    <h1 class="mainTitle"><?= $role["nom_role"] ?></h1>

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
                <b><?= $r["nomActeur"] ?></b> in : <?=$r["titre_film"]?>, (<?=$r["date"]?>)
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