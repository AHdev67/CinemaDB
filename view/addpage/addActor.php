<?php
    ob_start();
?>
<div class="container">
    <div class="mainTitle">
        <h1>ADD NEW ACTOR</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <a class="return" href="index.php?action=listActors">< Return to list</a>

    <?php 
        if(isset($_SESSION['alerte'])){
            echo $_SESSION['alerte'];
            unset($_SESSION['alerte']);
        }
    ?>

    <form class="customForm" action="index.php?action=submitActor" method="post">

        <p class="formBasicField">
            <label for="firstnameInput">First name* :</label>
            <input type="text" name="inputFirstname" id="firstnameInput">
        </p>
        
        <p class="formBasicField">
            <label for="lastnameInput">Last name* :</label>
            <input type="text" name="inputLastname" id="lastnameInput">
        </p>

        <p class="formBasicField">
            <label for="DoBInput">Date of birth* :</label>
            <input type="date" name="inputDoB" id="DoBInput">
        </p>
       
        <p class="formBasicField">
            <label for="sexInput">Sex :</label>
            <select name="inputSex" id="scoreInput">
                <option value="H">Male</option>
                <option value="F">Female</option>
            </select>
        </p>
        
        <p class="formBigText">
            <label for="biographyInput">Biography :</label>
            <textarea name="inputBiography" id="biographyInput" cols="43" rows="10"></textarea>
        </p>
        
        <p class="formBasicField">
            <label for="photoInput">Photo URL :</label>
            <input type="url" name="inputPhoto" id="photoInput">
        </p>
        
        <input type="submit" name="submitForm" id="formSubmit" value="Add actor to DB" class="formSubmit">
    </form>
</div>

<?php
$title= "ADD ACTOR";
$content= ob_get_clean();
$description= "Add an actor to the database.";
require "view/template.php";