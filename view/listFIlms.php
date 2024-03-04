<?php ob_start(); ?>

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
        <a href="view/addFilm.php">Add movie</a>
    </div>
</div>

<table class="list">
    <tbody>
        <?php
            foreach($requete -> fetchALL() as $film){?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td>(<?= $film["annee_sortie"] ?>)</td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$title= "MOVIES";
$title_secondary= "MOVIES";
$content= ob_get_clean();
require "view/template.php";