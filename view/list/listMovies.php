<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">MOVIES</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="" disabled selected>Sort by</option>
                <option value="title">Title</option>
                <option value="date">Date</option>
            </select>

            <select name="orderby" id="order1" class="opt">
                <option value="" disabled selected>Order</option>
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>

            <input type="submit" class="opt" name="submitSort" id="sortSubmit" value="Sort">
        </form>

        <div class="add">
            <a href="index.php?action=addMovieDisplay">Add movie ></a>
        </div>
    </div>

    <table class="list">
        <thead>
            <tr>
                <th>TITLE</th>
                <th>YEAR</th>
                <th>DIRECTOR</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryMovie -> fetchALL() as $film){?>
                    <tr>
                        <td class="mainLink"><a href="index.php?action=infoMovie&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                        <td class="smallCol"><?= $film["date"] ?></td>
                        <td><a href="index.php?action=infoDirector&id=<?= $film["id_realisateur"] ?>"><?= $film["realisateurFilm"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

$title= "MOVIES";
$content= ob_get_clean();
require "view/template.php";