<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">MOVIES</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="title">Title</option>
                <option value="date">Date</option>
            </select>

            <select name="orderby" id="order1" class="opt">
                <option value="asc">Ascendent</option>
                <option value="desc">Descendent</option>
            </select>
        </form>

        <div class="opt">
            <a href="">Add movie</a>
        </div>
    </div>

    <table class="list">
        <tbody>
            <?php
                foreach($queryMovieInfo -> fetchALL() as $film){?>
                    <tr>
                        <td><a href=""><?= $film["titre_film"] ?></a></td>
                        <td><a href="">(<?= $film["date"] ?>)</a></td>
                        <td><a href=""><?= $film["realisateurFilm"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "MOVIES";
$content= ob_get_clean();
require "view/template.php";