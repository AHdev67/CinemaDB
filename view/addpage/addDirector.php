<?php
    ob_start();
?>
<div class="container">
    <div class="mainTitle">
        <h1>ADD NEW DIRECTOR</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <a class="return" href="index.php?action=listDirectors">< Return to list</a>

    <?php 
        if(isset($_SESSION['alerte'])){
            echo $_SESSION['alerte'];
            unset($_SESSION['alerte']);
        }
    ?>

    <form class="customForm" action="index.php?action=submitDirector" method="post">
        
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
                <option value="H">Homme</option>
                <option value="F">Femme</option>
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
        


        <input type="submit" name="submitForm" id="formSubmit" value="Add director to DB" class ="formSubmit">
    </form>
</div>

<?php
$title= "ADD DIRECTOR";
$content= ob_get_clean();
$description= "Add a director to the database.";
require "view/template.php";