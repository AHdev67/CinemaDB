<?php
    ob_start();
?>
<div class="container">
    <div class="title">
        <h1>ADD NEW ROLE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <form action="index.php?action=submitRole" method="post">
        <label for="firstnameInput">Role name* :</label>
        <input type="text" name="inputFirstname" id="firstnameInput">

        <br>

        <label for="lastnameInput">Role description :</label>
        <input type="text" name="inputLastname" id="lastnameInput">

        <input type="submit" name="submitForm" id="formSubmit" value="Add movie to DB">
    </form>
</div>

<?php
$title= "ADD ROLE";
$content= ob_get_clean();
require "view/template.php";