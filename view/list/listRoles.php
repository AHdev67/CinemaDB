<?php ob_start(); ?>

<div class="container">
    <h1 class="mainTitle">ROLES</h1>

    <a class="add" href="index.php?action=addRoleDisplay">Add role</a>

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
$description= "List of roles in database.";
require "view/template.php";