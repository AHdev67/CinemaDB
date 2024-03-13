<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">DIRECTORS</h1>

    <div class="options">
        <form action="controller/CinemaController.php" method="post">
            <select name="sortby" id="sort1" class="opt">
                <option value="" disabled selected>Sort by</option>
                <option value="title">Name</option>
                <option value="date">Surname</option>
            </select>

            <select name="orderby" id="order1" class="opt">
                <option value="" disabled selected>Order</option>
                <option value="ASC">Asc</option>
                <option value="DESC">Desc</option>
            </select>

            <input type="submit" class="opt" name="submitSort" id="sortSubmit" value="Sort">
        </form>

        <div class="add">
            <a href="index.php?action=addDirectorDisplay">Add director</a>
        </div>
    </div>

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