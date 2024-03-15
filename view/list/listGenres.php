<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">GENRES</h1>

    <table class="list">
        <thead>
            <tr>
                <th>GENRE NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryGenre -> fetchALL() as $genre){?>
                    <tr>
                        <td class="mainLink"><a href="index.php?action=infoGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "GENRES";
$content= ob_get_clean();
require "view/template.php";