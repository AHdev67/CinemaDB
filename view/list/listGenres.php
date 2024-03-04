<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">GENRES</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="title">Name</option>
            </select>

            <select name="orderby" id="order1" class="opt">
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
                foreach($queryGenreInfo -> fetchALL() as $genre){?>
                    <tr>
                        <td><?= $genre["nom_genre"] ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "GENRES";
$content= ob_get_clean();
require "view/template.php";