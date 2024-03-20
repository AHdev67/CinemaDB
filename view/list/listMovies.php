<?php
ob_start();
?>

<div class="container">
    <h1 class="mainTitle">MOVIES</h1>

    <a class="add" href="index.php?action=addMovieDisplay">Add movie ></a>    

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
$description= "List of movies in database.";
require "view/template.php";