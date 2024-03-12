<?php 
    ob_start();
    $movieLatest = $queryMovieLatest->fetch();
    $movieChoice = $queryMovieChoice->fetch();
?>  

<!-- SECTION 1 : CAROUSSEL -->
<div id="section1" class="section">
    <h1 class="sectionTitle">DISCOVER</h1>
    <div class="caroussel">

        <div class="arrow" id="next"><i class="fa-solid fa-chevron-left"></i></div>
            
        <div class="carousselItem">
            <?php
            foreach($queryMovieCaroussel->fetchALL() as $movieCaroussel){?>
                <figure class="carousselImage">
                    <img src="" alt="background caroussel">
                </figure>

                <p class="titleCard">
                    <?= $movieCaroussel["titre_film"]?> (<?= $movieCaroussel["date"]?>), <?= $movieCaroussel["realisateurFilm"]?>
                </p>
            <?php } ?>
        </div>

        <div class="arrow" id="previous"><i class="fa-solid fa-chevron-right"></i></div>
    </div>

    <div id="carousselPosition">
        <span class="positionNode nodePassive"></span>
        <span class="positionNode nodePassive"></span>
        <span class="positionNode nodePassive"></span>
        <span class="positionNode nodePassive"></span>
        <span class="positionNode nodePassive"></span>
    </div>
</div>

<div id="moviepresentation">
    <!-- SECTION 2 : LATEST RELEASE -->
    <div id="section2" class="section">

        <h2 class="sectionTitle">LATEST RELEASE</h2>
        
        <div class="posterContainer">
             <figure class="poster">
                <img src="<?= $movieLatest["affiche"] ?>" alt="poster movie latest">
            </figure>
        </div>

        <p class="titleCard">
            <?= $movieLatest["titre_film"]?> (<?= $movieLatest["date"]?>), <?= $movieLatest["realisateurFilm"] ?>
        </p>
    </div>

    <!-- SECTION 3 : ADMIN'S CHOICE -->
    <div id="section3" class="section">

        <h2 class="sectionTitle">ADMIN'S CHOICE</h2>

        <div class="posterContainer">
            <figure class="poster">
                <img src="<?= $movieChoice["affiche"] ?>" alt="poster movie choice">
            </figure>
        </div>

        <p class="titleCard">
            <?= $movieChoice["titre_film"]?> (<?= $movieChoice["date"]?>), <?= $movieChoice["realisateurFilm"] ?>
        </p>
    </div>
</div>

<div class="peoplepresentation">
    <!-- SECTION 4 : POPULAR ACTORS -->
    <div id="section4" class="section">

        <h2 class="sectionTitle">POPULAR ACTORS</h2>

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
    <div id="section5" class="section">

        <h2 class="sectionTitle">POPULAR DIRECTORS</h2>

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