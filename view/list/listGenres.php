<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">GENRES</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="" disabled selected>Sort by</option>
                <option value="title">Name</option>
            </select>

            <select name="orderby" id="order1" class="opt">
                <option value="" disabled selected>Order</option>
                <option value="asc">Ascendent</option>
                <option value="desc">Descendent</option>
            </select>
        </form>

        <div class="opt">
            <a href="">Add genre</a>
        </div>
    </div>

    <table class="list">
        <tbody>
            <?php
                foreach($queryGenre -> fetchALL() as $genre){?>
                    <tr>
                        <td><a href="index.php?action=infoGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "GENRES";
$content= ob_get_clean();
require "view/template.php";