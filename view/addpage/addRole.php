<?php
    ob_start();
?>
<div class="container">
    <div class="mainTitle">
        <h1>ADD NEW ROLE</h1>
        <span>(fields with * are mandatory)</span>
    </div>

    <form class="customForm" action="index.php?action=submitRole" method="post">

        <p class="formBasicField">
            <label for="roleNameInput">Role name* :</label>
            <input type="text" name="inputRoleName" id="roleNameInput">
        </p>

        <p class="formBigText">
            <label for="roleDescInput">Role description :</label>
            <textarea name="inputRoleDesc" id="roleDescInput" cols="43" rows="10"></textarea>
        </p>
        
        <input type="submit" name="submitForm" id="formSubmit" value="Add role to DB" class="formSubmit">
    </form>
</div>

<?php
$title= "ADD ROLE";
$content= ob_get_clean();
require "view/template.php";