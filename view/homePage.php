<?php 
    ob_start();
    $movie = $queryMovieCard->fetch();
    $person = $queryPersonCard->fetch();
?>

<!-- SECTION 1 : CAROUSSEL -->
<div id="section1">
    <h1>DISCOVER</h1>
    <div class="caroussel">
        <div class="arrow" id="next"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="carousselitem">
                <figure class="carousselimage">
                    <img src="<?= $movie["affiche"]?>" alt="background caroussel">
                </figure>
                <div class="carousseltitle">
                    <?= $movie["titre_film"]?> (<?= $movie["date"]?>), <?= $movie["realisateurFilm"]?>
                </div>
            </div>
        <div class="arrow" id="previous"><i class="fa-solid fa-chevron-left"></i></div>
    </div>
</div>

<div id="moviepresentation">
    <!-- SECTION 2 : LATEST RELEASE -->
    <div id="section2">
        <h2 class="sectiontitle">LATEST RELEASE</h2>
        <div class="postercontainer">
            <figure class="poster">
                <img src="" alt="poster movie latest">
            </figure>
        </div>
    </div>

    <!-- SECTION 3 : ADMIN'S CHOICE -->
    <div id="section3">
        <h2 class="sectiontitle">ADMIN'S CHOICE</h2>
        <div class="postercontainer">
            <figure class="poster">
                <img src="" alt="poster movie choice">
            </figure>
        </div>
    </div>
</div>

<div class="peoplepresentation">
    <!-- SECTION 4 : POPULAR ACTORS -->
    <div id="section4">
        <h2 class="sectiontitle">POPULAR ACTORS</h2>
        <div class="popularselection">
            <figure class="portrait">
                <img src="" alt="photo actor 1">
            </figure>
            <figure class="portrait">
                <img src="" alt="photo actor 2">
            </figure>
            <figure class="portrait">
                <img src="" alt="photo actor 3">
            </figure>
        </div>
    </div>

    <!-- SECTION 5 : POPULAR DIRECTORS -->
    <div id="section5">
        <h2 class="sectiontitle">POPULAR DIRECTORS</h2>
        <div class="popularselection">
            <figure class="portrait">
                <img src="" alt="photo director 1">
            </figure>
            <figure class="portrait">
                <img src="" alt="photo director 2">
            </figure>
            <figure class="portrait">
                <img src="" alt="photo director 3">
            </figure>
        </div>
    </div>
</div>

<?php
$title= "HOME";
$content= ob_get_clean();
require "view/template.php";