<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">DIRECTORS</h1>

    <a class="add" href="index.php?action=addDirectorDisplay">Add director</a>

    <table class="list">
        <thead>
            <tr>
                <th>DIRECTOR NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryDirector -> fetchALL() as $director){?>
                    <tr>
                        <td class="mainLink"><a href="index.php?action=infoDirector&id=<?= $director["id_realisateur"] ?>"><?= $director["nomRealisateur"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$title= "DIRECTORS";
$content= ob_get_clean();
require "view/template.php";