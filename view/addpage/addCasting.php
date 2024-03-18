<?php
    ob_start();
    $casting = $queryCasting->fetchAll();
?>
<div class="container">
    <div class="mainTitle">
        <h1>ADD ACTOR TO CASTING</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <a class="return" href="index.php?action=infoMovie&id=<?= $id ?>">< Return to movie</a>

    <form class="customForm" action="index.php?action=submitCasting&id=<?= $id ?>" method="post">

        <p class="formBasicField">
            <label for="actorInput">Actor* :</label>
            <select name="inputActor" id="actorInput" required>
                <option value="" disabled selected>Select actor</option>
                <?php
                foreach($queryInputActor->fetchALL() as $actor) { ?>
                    <option value="<?= $actor["id_acteur"]?>"><?= $actor["nomActeur"] ?></option>
                <?php } ?>
            </select>
        </p>

        <p class="formBasicField">
            <label for="roleInput">Role* :</label>
            <select name="inputRole" id="roleInput" required>
                <option value="" disabled selected>Select role</option>
                <?php
                foreach($queryInputRole->fetchALL() as $role) { ?>
                    <option value="<?= $role["id_role"]?>"><?= $role["nom_role"] ?></option>
                <?php } ?>
            </select>
        </p>
        
        <input type="submit" name="submitForm" id="formSubmit" value="Confirm" class="formSubmit">
    </form>

    <div class="subInfo">
        <div class="subInfoHeader">
            <h3>Casting :</h3>
        </div>
        
        <?php
        foreach ($casting as $c) {?>
            <div class="subInfoItem">
                <div class="actorinfomini">
                    <figure class="actorphotomini">
                        <img src="" alt="photo acteur">
                    </figure>

                    <p>
                        <a href="index.php?action=infoActor&id=<?= $c["id_acteur"] ?>">
                            <b><?=$c["nomActeur"]?></b>
                        </a>
                    </p>

                    <p>
                        In the role of : 
                        <a href="index.php?action=infoRole&id=<?= $c["id_role"] ?>">
                            <?=$c["nom_role"]?>
                        </a>
                    </p>
                </div>

                <a href="index.php?action=deleteCasting&id=<?= $id .",". $c["id_acteur"] .",". $c["id_role"] ?>">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        <?php } ?>
        
    </div>
</div>

<?php
$title= "ADD CASTING";
$content= ob_get_clean();
require "view/template.php";