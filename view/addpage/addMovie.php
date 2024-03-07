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
                <input type="checkbox" name="inputGenre" id="<?= $genre["id_genre"] ?>">
                <label for="<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></label><br>
            <?php } ?>

        <label for="scoreInput">Score out of 5:</label>
        <select name="inputScore" id="scoreInput">
            <option value="" disabled selected>Select score</option>
            <option value="1">1/5, F tier, don't watch</option>
            <option value="2">2/5, bad movie, but there's worse</option>
            <option value="3">3/5, passable, watchable</option>
            <option value="4">4/5, pretty good movie all in all</option>
            <option value="5">5/5, excellent movie, must watch</option>
        </select>

        <br>

        <label for="synopsisInput">Synopsis</label>
        <input type="text" name="inputSynopsis" id="synopsisInput">

        <br>

        <label for="posterInput"></label>
        <input type="file" name="inputPoster" id="posterInput">

        <br>

        <input type="submit" name="submitForm" id="formSubmit" value="Add movie to DB">
    </form>
</div>

<?php
$title= "ADD MOVIE";
$content= ob_get_clean();
require "view/template.php";