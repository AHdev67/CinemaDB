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
            
        <div class="carousselContainer">
            <?php
            foreach($queryMovieCaroussel->fetchALL() as $movieCaroussel){?>
                <div class="carousselItem carousselHidden">

                    <figure class="carousselImage">
                        <img src="" alt="background caroussel">
                    </figure>

                    <p class="titleCard">
                        <?= $movieCaroussel["titre_film"]?> (<?= $movieCaroussel["date"]?>), <?= $movieCaroussel["realisateurFilm"]?>
                    </p>
                </div>
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
                <a href="index.php?action=infoMovie&id=<?= $movieLatest["id_film"] ?>">
                    <img src="<?= $movieLatest["affiche"] ?>" alt="poster movie latest">
                </a>
            </figure>

            <p class="titleCard">
                <a href="index.php?action=infoMovie&id=<?= $movieLatest["id_film"] ?>">
                    <b><?= $movieLatest["titre_film"]?></b> (<?= $movieLatest["date"]?>), <?= $movieLatest["realisateurFilm"] ?>
                </a>
            </p>
        </div>

        
    </div>

    <!-- SECTION 3 : ADMIN'S CHOICE -->
    <div id="section3" class="section">

        <h2 class="sectionTitle">ADMIN'S CHOICE</h2>

        <div class="posterContainer">
            <figure class="poster">
                <a href="index.php?action=infoMovie&id=<?= $movieChoice["id_film"] ?>">
                    <img src="<?= $movieChoice["affiche"] ?>" alt="poster movie choice">
                </a>
            </figure>

           <p class="titleCard">
                <a href="index.php?action=infoMovie&id=<?= $movieChoice["id_film"] ?>">
                    <b><?= $movieChoice["titre_film"]?></b> (<?= $movieChoice["date"]?>), <?= $movieChoice["realisateurFilm"] ?>
                </a>
            </p> 
        </div>

        
    </div>
</div>

<div class="peoplepresentation">
    <!-- SECTION 4 : POPULAR ACTORS -->
    <div id="section4" class="section">

        <h2 class="sectionTitle">POPULAR ACTORS</h2>


        <div class="popularSelection">
            <?php
            foreach($queryActorCard->fetchALL() as $actor){?> 
                <div class="personCard">
                    <figure class="portrait">
                        <a href="index.php?action=infoActor&id=<?= $actor["id_acteur"] ?>">
                            <img src="<?= $actor["photo"] ?>" alt="actor photo">
                        </a>
                    </figure>

                    <p class="nameCard">
                        <a href="index.php?action=infoActor&id=<?= $actor["id_acteur"] ?>">
                            <?= $actor["actorName"]?>
                        </a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- SECTION 5 : POPULAR DIRECTORS -->
    <div id="section5" class="section">

        <h2 class="sectionTitle">POPULAR DIRECTORS</h2>

        <div class="popularSelection">
            <?php
            foreach($queryDirectorCard->fetchALL() as $director){?> 
                <div class="personCard">
                    <figure class="portrait">
                        <a href="index.php?action=infoDirector&id=<?= $director["id_realisateur"] ?>">
                            <img src="<?= $director["photo"] ?>" alt="director photo">
                        </a>
                    </figure>

                    <p class="nameCard">
                        <a href="index.php?action=infoDirector&id=<?= $director["id_realisateur"] ?>">
                            <?= $director["directorName"]?>
                        </a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$title= "HOME";
$content= ob_get_clean();
require "view/template.php";