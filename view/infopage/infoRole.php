<?php
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dignissimos atque voluptatem! Aliquid similique, provident reprehenderit error nemo ipsam esse quis fugit. A, veniam nihil! Sapiente eos magnam error vero.
            Nisi tempore expedita maxime id eum enim omnis? Facilis officiis neque architecto accusantium debitis consectetur consequuntur repellat totam, quisquam perspiciatis fuga suscipit placeat vero ipsam odit est voluptatum. Placeat, doloremque.
            Eligendi aperiam pariatur ea quod optio explicabo quasi non voluptatum accusantium ducimus blanditiis excepturi sequi fugit delectus quibusdam sed, ipsa quas? Suscipit facere, voluptatibus ipsa eaque dolore soluta sed maxime.
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