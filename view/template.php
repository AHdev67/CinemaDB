<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b28c0a82b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/main.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav>
            <div class="navbarContent">
                
                <span class="navtitle">
                    <a href="index.php?action=homePage">
                        <div class="navlogo"><i class="fa-solid fa-film"></i></div>
                        CINEMA DB
                    </a>
                </span>
                
                <div class="searchbar"><i class="fa-solid fa-magnifying-glass"></i></div>

                <div class="burgermenu">
                    <span class="burgericon"></span>
                    <span class="burgericon"></span>
                    <span class="burgericon"></span>
                </div>

                <div class="menu">
                    <ul>
                        <li>
                            <a href="index.php?action=listMovies">MOVIES</a>
                        </li>
                        <li>
                            <a href="index.php?action=listDirectors">DIRECTORS</a>
                        </li>
                        <li>
                            <a href="index.php?action=listActors">ACTORS</a>
                        </li>
                        <li>
                            <a href="index.php?action=listGenres">GENRES</a>
                        </li>
                        <li>
                            <a href="index.php?action=listRoles">ROLES</a>
                        </li>
                        <li>
                            <a href="">CONTACT US</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <div id="content">
            <?= $content ?>
        </div>
    </main>
</body>
</html>