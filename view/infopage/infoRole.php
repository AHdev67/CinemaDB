<?php
    ob_start();
    $role = $queryRoleInfo->fetch();
    $roleActeur = $queryRoleActor->fetchAll();
?>

<div class="wrapper">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $role["nom_role"] ?></h1>
        </div>
    </div>

    <article>
        <h3>Character :</h3>
        <p>
            <?= $role["description_role"] ?>
        </p>
    </article>

    <div class="role">
        <h3>Played by :</h3>
    <?php
    foreach ($roleActeur as $r) {?>
        <div class="roleitem">
            <div class="roleinfomini">
                <p>
                <?= $r["nomActeur"] ?> in : <?=$r["titre_film"]?>, (<?=$r["date"]?>)
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