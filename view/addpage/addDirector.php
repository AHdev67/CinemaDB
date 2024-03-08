<?php
    ob_start();
?>
<div class="wrapper">
    <div class="title">
        <h1>ADD NEW DIRECTOR</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <form action="index.php?action=submitMovie" method="post">
        <label for="firstnameInput">First name* :</label>
        <input type="text" name="inputFirstname" id="firstnameInput">

        <br>

        <label for="lastnameInput">Last name* :</label>
        <input type="text" name="inputLastname" id="lastnameInput">

        <br>
    
        <label for="DoBInput">Date of birth* :</label>
        <input type="date" name="inputDoB" id="DoBInput">

        <br>

        <label for="sexInput">Sex :</label>
        <select name="inputSex" id="scoreInput">
            <option value="H">Homme</option>
            <option value="F">Femme</option>
        </select>

        <br>

        <label for="biographyInput">Biography</label>
        <input type="text" name="inputBiography" id="biographyInput">

        <br>

        <label for="photoInput">Photo URL :</label>
        <input type="text" name="inputPhoto" id="photoInput">

        <br>

        <input type="submit" name="submitForm" id="formSubmit" value="Add movie to DB">
    </form>
</div>

<?php
$title= "ADD DIRECTOR";
$content= ob_get_clean();
require "view/template.php";