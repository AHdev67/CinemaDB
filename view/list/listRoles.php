<?php ob_start(); ?>

<div class="wrapper">
    <h1 class="maintitle">ROLES</h1>

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
            <a href="">Add role</a>
        </div>
    </div>

    <table class="list">
        <tbody>
            <?php
                foreach($queryRole -> fetchALL() as $role){?>
                    <tr>
                        <td><a href="index.php?action=infoRole&id=<?= $role["id_role"] ?>"><?= $role["nom_role"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

$title= "ROLES";
$content= ob_get_clean();
require "view/template.php";