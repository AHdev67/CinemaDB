<?php
    ob_start();
?>
<div class="wrapper">
    <div class="title">
        <h1>ADD NEW MOVIE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <form action="" method="post">
        <label for="titleInput">Title* :</label>
        <input type="text" name="inputTile" id="titleInput">
        <br>
        <label for="directorInput">Director* :</label>
        <select name="inputDirector" id="directorInput">
            <option value="" disabled selected>Select director</option>
            <option value="">director 1</option>
            <option value="">director 2</option>
        </select>
        <br>
        <label for="releasedateInput">Release date* :</label>
        <input type="text" name="inputReleaseDate" id="releasedateInput">
        <br>
        <label for="durationInput">Duration* :</label>
        <input type="text" name="inputDuration" id="durationInput">
         minutes
        <br>
        <span>Genre* :</span><br>
            <input type="checkbox" name="inputGenre" id="genre1">
            <label for="genre1">Sci-Fi</label><br>

            <input type="checkbox" name="inputGenre" id="genre2">
            <label for="genre2">Horror</label><br>

            <input type="checkbox" name="inputGenre" id="genre3">
            <label for="genre3">Action</label><br>

            <input type="checkbox" name="inputGenre" id="genre4">
            <label for="genre4">Comedy</label><br>

            <input type="checkbox" name="inputGenre" id="genre5">
            <label for="genre5">Kaiju</label><br>

        <label for="scoreInput">Score out of 5:</label>
        <select name="inputScore" id="scoreInput">
            <option value="1">1/5, F tier, don't watch</option>
            <option value="2">2/5, bad movie, but there's worse</option>
            <option value="3">3/5, passable</option>
            <option value="4">4/5, pretty good movie all in all</option>
            <option value="5">5/5, excellent movie, must watch</option>
        </select>

    </form>
</div>
