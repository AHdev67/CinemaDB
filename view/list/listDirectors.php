<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">DIRECTORS</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="title">Name</option>
                <option value="date">Surname</option>
            </select>

            <select name="orderby" id="order1" class="opt">
                <option value="asc">Ascendent</option>
                <option value="desc">Descendent</option>
            </select>
        </form>

        <div class="opt">
            <a href="">Add director</a>
        </div>
    </div>

    <table class="list">
        <tbody>
            <?php
                foreach($queryDirector -> fetchALL() as $director){?>
                    <tr>
                        <td><a href="index.php?action=infoDirector&id=<?= $director["id_realisateur"] ?>"><?= $director["nomRealisateur"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "DIRECTORS";
$content= ob_get_clean();
require "view/template.php";