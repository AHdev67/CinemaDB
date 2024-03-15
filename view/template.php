<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b28c0a82b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="public\css\main.css">
    <title><?= $title ?></title>
</head>

<body>
    <div id="wrapper">

    <!-- ---------------------------------NAVBAR--------------------------------- -->
        <header>
            <nav>
                <div id="navtitle">
                    <a href="index.php?action=homePage">
                        <i id="navlogo" class="fa-solid fa-clapperboard"></i>
                        CINEMA DB
                    </a>
                </div>

                <div id="search">
                    <input type="text" placeholder="search" id="searchbar"></input>
                    <a id="searchButton" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                </div> 
                    

                <button id="burger">
                    <i id="menuIcon" class="fa-solid fa-bars"></i>
                    <i id="closeIcon" class="fa-solid fa-xmark"></i>
                </button>

                <ul id="menu" class="hideMenu">

                    <li>
                        <a class="menuItem" href="index.php?action=homePage">HOME</a>
                    </li>                
                    <li>
                        <a class="menuItem" href="index.php?action=listMovies">MOVIES</a>
                    </li>
                    <li>
                        <a class="menuItem" href="index.php?action=listDirectors">DIRECTORS</a>
                    </li>
                    <li>
                        <a class="menuItem" href="index.php?action=listActors">ACTORS</a>
                    </li>
                    <li>
                        <a class="menuItem" href="index.php?action=listRoles">ROLES</a>
                    </li>
                    <li>
                        <a class="menuItem" href="index.php?action=listGenres">GENRES</a>
                    </li>
                </ul>
            </nav>
        </header>

    <!-- ----------------------------------MAIN---------------------------------- -->
        <main>
            <div id="content">
                <?= $content ?>
            </div>
        </main>

    <!-- ---------------------------------FOOTER--------------------------------- -->
        <footer>
            <div id="footer1">
                <h2>CONTACT</h2>
                <p>
                    <a href="mailto:cinemadb@contact.com">cinemadb@contact.com</a>
                </p>

                <p>
                    06 83 00 69 42
                </p>  
            </div>

            <div id="footer2">
            <p>
                    <a href="">Q&A</a>
            </p>

            <p>
                    <a href="">Privacy policy</a>
            </p>
            </div>

            <div id="footer3">
                <h2>FOLLOW US</h2>

                <p>
                    <span id="insta" class="socialIcon">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                    </span>

                    <span id="twitter" class="socialIcon">
                        <a href=""><i class="fa-brands fa-square-twitter"></i></a>
                    </span>

                    <span id="fb" class="socialIcon">
                        <a href=""><i class="fa-brands fa-square-facebook"></i></a>
                    </span>
                </p>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,
            // If we need pagination
            pagination: {
            el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

<!-- ---------------------------SCRIPT MENU BURGER--------------------------- -->
    <script>
        const menu = document.querySelector("#menu");
        const menuItems = document.querySelectorAll(".menuItem");
        const hamburger= document.querySelector("#burger");
        const closeIcon= document.querySelector("#closeIcon");
        const menuIcon = document.querySelector("#menuIcon");

        function toggleMenu() {
            if (menu.classList.contains("hideMenu")) {
                menu.classList.remove("hideMenu");
                closeIcon.style.display = "block";
                menuIcon.style.display = "none";
            } else {
                menu.classList.add("hideMenu");
                closeIcon.style.display = "none";
                menuIcon.style.display = "block";
            }
        }

        hamburger.addEventListener("click", toggleMenu);
    </script>
</body>
</html>