<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b28c0a82b5.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="/public/css/main.css"> -->
   <link rel="stylesheet" href="public\css\main.css">
    <title><?= $title ?></title>
</head>
<body>
    <!-- NAVBAR -->
    <header>
        <nav>
            <div id="navbarContent">

                <div id="navtitle">
                    <a href="index.php?action=homePage">
                        <i id="navlogo" class="fa-solid fa-clapperboard"></i>
                        CINEMA DB
                    </a>
                </div>

                <div id="search">
                    <input type="text" placeholder="search" id="searchbar"></input>
                    <button id="searchbutton">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
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
                    <li>
                        <a class="menuItem" href="">CONTACT US</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <main id="wrapper">
        <div id="content">
            <?= $content ?>
        </div>
    </main>

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