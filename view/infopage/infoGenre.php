<?php
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dignissimos atque voluptatem! Aliquid similique, provident reprehenderit error nemo ipsam esse quis fugit. A, veniam nihil! Sapiente eos magnam error vero.
            Nisi tempore expedita maxime id eum enim omnis? Facilis officiis neque architecto accusantium debitis consectetur consequuntur repellat totam, quisquam perspiciatis fuga suscipit placeat vero ipsam odit est voluptatum. Placeat, doloremque.
            Eligendi aperiam pariatur ea quod optio explicabo quasi non voluptatum accusantium ducimus blanditiis excepturi sequi fugit delectus quibusdam sed, ipsa quas? Suscipit facere, voluptatibus ipsa eaque dolore soluta sed maxime.
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