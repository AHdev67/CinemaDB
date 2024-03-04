<?php
    $movie = $queryMovieInfo->fetch();
    $casting = $reqCasting->fetchAll();
?>

<div class="wrapper">
    
    <div class="infobox">
        <div class="info">
            <h1 class="maintitle"><?= $movie["titre_film"] ?></h1>
            <span>(<?= $movie["date"] ?>)</span>
            <p>
                Directed by :
                <?= $movie["realisateurFilm"] ?>
            </p>

            <p>
                Duration :
                <?= $movie["duree"] ?>
            </p>

            <p>
                Score :
                <?= $movie["note"] ?>
            </p>
        </div>

        <figure class="infoimg">
            <img src="<?= $movie["affiche"] ?>" alt="">
        </figure>
    </div>
    <article>
        <h3>Synopsis :</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dignissimos atque voluptatem! Aliquid similique, provident reprehenderit error nemo ipsam esse quis fugit. A, veniam nihil! Sapiente eos magnam error vero.
            Nisi tempore expedita maxime id eum enim omnis? Facilis officiis neque architecto accusantium debitis consectetur consequuntur repellat totam, quisquam perspiciatis fuga suscipit placeat vero ipsam odit est voluptatum. Placeat, doloremque.
            Eligendi aperiam pariatur ea quod optio explicabo quasi non voluptatum accusantium ducimus blanditiis excepturi sequi fugit delectus quibusdam sed, ipsa quas? Suscipit facere, voluptatibus ipsa eaque dolore soluta sed maxime.
        </p>
    </article>

    <div class="casting">
        <h3>Casting :</h3>
    <?php
    foreach ($casting as $c) {
        # code...
    }
    ?>
    </div>


    
</div>