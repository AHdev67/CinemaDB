<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">ROLES</h1>

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

            <input type="submit" class="opt" name="submitSort" id="sortSubmit" value="Sort">
        </form>

        <div class="add">
            <a href="index.php?action=addRoleDisplay">Add role</a>
        </div>
    </div>

    <table class="list">
        <thead>
            <tr>
                <th>ROLE NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryRole -> fetchALL() as $role){?>
                    <tr>
                        <td class="mainLink"><a href="index.php?action=infoRole&id=<?= $role["id_role"] ?>"><?= $role["nom_role"] ?></a></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

$title= "ROLES";
$content= ob_get_clean();
require "view/template.php";