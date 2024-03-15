<?php
    ob_start();
    $movie = $queryModForm->fetch();
    $movieCategorization = $queryMovieCategorization->fetchALL();
?>

<div class="container">
    <div class="mainTitle">
        <h1>MODIFY MOVIE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <a class="return" href="index.php?action=infoMovie&id=<?= $movie["id_film"] ?>">< Return to movie</a>

    <form class="customForm" action="index.php?action=submitMovie" method="post">

        <p class="formBasicField">
            <label for="titleInput">Title* :</label>
            <input type="text" name="inputTile" id="titleInput" value="<?= $movie["titre_film"] ?>">
        </p>

        <p class="formBasicField">
            <label for="directorInput">Director* :</label>
            <select name="inputDirector" id="directorInput">
                <option value="<?= $movie["id_realisateur"]?>" disabled selected><?= $movie["realisateurFilm"]?></option>
                <?php
                foreach($queryInputDirector->fetchALL() as $director) { ?>
                    <option value="<?= $director["id_realisateur"]?>"><?= $director["realisateurFilm"] ?></option>
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
        foreach($queryInputGenre->fetchALL() as $genre) {
            //possibly add another foreach here, i don't know, figure it out
            if($genre["id_genre"] = $movieCategorization["id_genre"]){
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
             <label for="scoreInput">Score :</label>
            <select name="inputScore" id="scoreInput">
                <option value="<?= $movie["note"]?>" disabled selected><?= $movie["note"]?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <span> stars</span>
        </p>
       
        <p class="formBigText">
            <label for="synopsisInput">Synopsis :</label>
            <textarea name="inputSynopsis" id="synopsisInput" cols="43" rows="10"><?= $movie["synopsis"]?></textarea>
        </p>
        
        <p class="formBasicField">
            <label for="posterInput">Poster URL :</label>
            <input type="url" name="inputPoster" id="posterInput" value="<?= $movie["affiche"]?>">
        </p>
        
        <input type="submit" name="submitForm" id="formSubmit" value="Add movie to DB" class="formSubmit">
    </form>
</div>

<?php
$title= "MODIFY MOVIE";
$content= ob_get_clean();
require "view/template.php";