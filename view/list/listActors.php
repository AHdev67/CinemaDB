<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">ACTORS</h1>

    <a class="add" href="index.php?action=addActorDisplay">Add actor</a>

    <table class="list">
        <thead>
            <tr>
                <th>ACTOR NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryActor -> fetchALL() as $actor){?>
                    <tr>
                        <td class="mainLink"><a href="index.php?action=infoActor&id=<?= $actor["id_acteur"] ?>"><?= $actor["nomActeur"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

$title= "ACTORS";
$content= ob_get_clean();
$description= "List of actors in database.";
require "view/template.php";