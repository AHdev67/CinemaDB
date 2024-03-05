<?php
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dignissimos atque voluptatem! Aliquid similique, provident reprehenderit error nemo ipsam esse quis fugit. A, veniam nihil! Sapiente eos magnam error vero.
            Nisi tempore expedita maxime id eum enim omnis? Facilis officiis neque architecto accusantium debitis consectetur consequuntur repellat totam, quisquam perspiciatis fuga suscipit placeat vero ipsam odit est voluptatum. Placeat, doloremque.
            Eligendi aperiam pariatur ea quod optio explicabo quasi non voluptatum accusantium ducimus blanditiis excepturi sequi fugit delectus quibusdam sed, ipsa quas? Suscipit facere, voluptatibus ipsa eaque dolore soluta sed maxime.
        </p>
    </article>

    <div class="filmography">
        <h3>Filmography :</h3>
    <?php
    foreach ($filmography as $f) {?>
        <div class="filmographyitem">
            <div class="movieinfomini">
                <p>
                    <?=$f["titre_film"]?>, (<?=$f["date"]?>), dans le rôle de : <?=$f["nom_role"]?>
                </p>
            </div>
        </div>
    <?php } ?>

    </div>

</div>