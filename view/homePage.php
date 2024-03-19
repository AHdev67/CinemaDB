<?php 
    ob_start();
    $carouselItem1 = $queryMovieCaroussel1->fetch();
    $carouselItem2 = $queryMovieCaroussel2->fetch();
    $carouselItem3 = $queryMovieCaroussel3->fetch();

    $movieLatest = $queryMovieLatest->fetch();
    $movieChoice = $queryMovieChoice->fetch();
?>  

<div class="container">

    <!-- SECTION 1 : CAROUSSEL -->
    <section id="section1" class="section">
        <h1 class="sectionTitle">DISCOVER</h1>

        <div class="swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide" id="slide1">
                    <div class="posterContainerCarousel">
                        <figure class="poster">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem1["id_film"] ?>">
                                <img src="<?= $carouselItem1["affiche"] ?>" alt="poster movie latest">
                            </a>
                        </figure>

                        <p class="titleCard">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem1["id_film"] ?>">
                                <b><?= $carouselItem1["titre_film"]?></b> (<?= $carouselItem1["date"]?>), <?= $carouselItem1["realisateurFilm"] ?>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="swiper-slide" id="slide2">
                    <div class="posterContainerCarousel">
                        <figure class="poster">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem2["id_film"] ?>">
                                <img src="<?= $carouselItem2["affiche"] ?>" alt="poster movie latest">
                            </a>
                        </figure>

                        <p class="titleCard">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem2["id_film"] ?>">
                                <b><?= $carouselItem2["titre_film"]?></b> (<?= $carouselItem2["date"]?>), <?= $carouselItem2["realisateurFilm"] ?>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="swiper-slide" id="slide3">
                    <div class="posterContainerCarousel">
                        <figure class="poster">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem3["id_film"] ?>">
                                <img src="<?= $carouselItem3["affiche"] ?>" alt="poster movie latest">
                            </a>
                        </figure>

                        <p class="titleCard">
                            <a href="index.php?action=infoMovie&id=<?= $carouselItem3["id_film"] ?>">
                                <b><?= $carouselItem3["titre_film"]?></b> (<?= $carouselItem3["date"]?>), <?= $carouselItem3["realisateurFilm"] ?>
                            </a>
                        </p>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>

    </section>

    <div class="subContent">

        <div id="moviePresentation">
            <!-- SECTION 2 : LATEST RELEASE -->
            <section id="section2" class="section">

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

                
            </section>

            <!-- SECTION 3 : ADMIN'S CHOICE -->
            <section id="section3" class="section">

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

                
            </section>
        </div>

        <div class="peoplePresentation">
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
    </div>
</div>

<?php
$title= "HOME";
$content= ob_get_clean();
require "view/template.php";