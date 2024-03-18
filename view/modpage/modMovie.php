<?php
    ob_start();
    $movie = $queryModForm->fetch();
?>

<div class="container">
    <div class="mainTitle">
        <h1>MODIFY MOVIE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <a class="return" href="index.php?action=infoMovie&id=<?= $movie["id_film"] ?>">< Return to movie</a>

    <form class="customForm" action="index.php?action=submitUpdateMovie&id=<?= $movie["id_film"] ?>" method="post">

        <p class="formBasicField">
            <label for="titleInput">Title* :</label>
            <input type="text" name="inputTile" id="titleInput" value="<?= $movie["titre_film"] ?>">
        </p>

        <p class="formBasicField">
            <label for="directorInput">Director* :</label>
            <select name="inputDirector" id="directorInput">
                <?php
                foreach($queryInputDirector->fetchALL() as $director) { 
                    if($movie["id_realisateur"] == $director["id_realisateur"]){
                        $selectedDirector = "selected";
                    }else{
                        $selectedDirector = "";
                    } ?>
                    <option value="<?= $director["id_realisateur"]?>" <?= $selectedDirector ?>><?= $director["realisateurFilm"] ?></option>
                <?php } ?>
            </select>
        </p>
        
        <p class="formBasicField">
            <label for="releasedateInput">Release date* :</label>
            <input type="date" name="inputReleaseDate" id="releasedateInput" value="<?= $movie["date_sortie"]?>">
        </p>
       
        <p class="formDuration">
            <label for="durationInput">Duration* :</label>
            <input type="text" name="inputDuration" id="durationInput" value="<?= $movie["duree"]?>">
            minutes
        </p>
        
        <span class="strayTitle">Genre* :</span><br>
        <?php

        $genresThisMovie = [];
        foreach($queryMovieCategorization->fetchALL() as $c){
            $genresThisMovie[] = $c["id_genre"];
        }

        foreach($queryInputGenre->fetchALL() as $genre) {

            if(in_array($genre["id_genre"] ,$genresThisMovie)){
            $isChecked="checked";
            }else{
                $isChecked="";
            }?>
            
            <p class="formGenre">
                <input type="checkbox" <?= $isChecked?> value="<?= $genre["id_genre"]?>" name="<?= "inputGenre".$genre["id_genre"] ?>" id="<?= $genre["id_genre"] ?>">
                <label for="<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></label>
            </p>
        <?php } ?>

        <p class="formScore">
            <?php
            $scores = [1,2,3,4,5];
            ?>
            <label for="scoreInput">Score :</label>
            <select name="inputScore" id="scoreInput">
                <?php
                foreach($scores as $s){
                    if($movie["note"] == $s){
                        $selectedScore = "selected";
                    }else{
                        $selectedScore = "";
                    }?>
                    <option value=<?= $s ?> <?= $selectedScore ?>><?= $s ?></option>
                <?php } ?>
                
            </select>
            <span> stars</span>
        </p>
       
        <p class="formBigText">
            <label for="synopsisInput">Synopsis :</label>
            <textarea name="inputSynopsis" id="synopsisInput" cols="43" rows="10"><?= $movie["synopsis"]?></textarea>
        </p>
        
        <p class="formBasicField">
            <label for="posterInput">Poster URL :</label>
            <input type="text" name="inputPoster" id="posterInput" value="<?= $movie["affiche"]?>">
        </p>
        
        <input type="submit" name="submitUpdate" id="updateSubmit" value="Update movie" class="formSubmit">
    </form>
</div>

<?php
$title= "MODIFY MOVIE";
$content= ob_get_clean();
require "view/template.php";