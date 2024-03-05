<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">ROLES</h1>

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
            <a href="">Add role</a>
        </div>
    </div>

    <table class="list">
        <tbody>
            <?php
                foreach($queryRole -> fetchALL() as $role){?>
                    <tr>
                        <td><?= $role["nom_role"] ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

$title= "ROLES";
$content= ob_get_clean();
require "view/template.php";