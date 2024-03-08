<?php
    ob_start();
?>
<div class="wrapper">
    <div class="title">
        <h1>ADD NEW MOVIE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <form action="index.php?action=submitMovie" method="post">
        <label for="titleInput">Title* :</label>
        <input type="text" name="inputTile" id="titleInput">

        <br>

        <label for="directorInput">Director* :</label>
        <select name="inputDirector" id="directorInput">
            <option value="" disabled selected>Select director</option>
            <?php
            foreach($queryInputDirector->fetchALL() as $director) { ?>
                <option value="<?= $director["id_realisateur"]?>"><?= $director["realisateurFilm"] ?></option>
            <?php } ?>
        </select>

        <br>

        <label for="releasedateInput">Release date* :</label>
        <input type="date" name="inputReleaseDate" id="releasedateInput">

        <br>

        <label for="durationInput">Duration* :</label>
        <input type="text" name="inputDuration" id="durationInput">
         minutes

        <br>

        <span>Genre* :</span><br>
        <?php
        foreach($queryInputGenre->fetchALL() as $genre) { ?>
            <input type="checkbox" value="<?= $genre["id_genre"]?>" name="<?= "inputGenre".$genre["id_genre"] ?>" id="<?= $genre["id_genre"] ?>">
            <label for="<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></label>
            <br>
        <?php } ?>

        <label for="scoreInput">Score :</label>
        <select name="inputScore" id="scoreInput">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <span> stars</span>

        <br>

        <label for="synopsisInput">Synopsis</label>
        <input type="text" name="inputSynopsis" id="synopsisInput">

        <br>

        <label for="posterInput">Poster URL :</label>
        <input type="text" name="inputPoster" id="posterInput">

        <br>

        <input type="submit" name="submitForm" id="formSubmit" value="Add movie to DB">
    </form>
</div>

<?php
$title= "ADD MOVIE";
$content= ob_get_clean();
require "view/template.php";