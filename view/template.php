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
                <div class="navlogo"><i class="fa-solid fa-film"></i></div>

                <span class="navtitle">CINEMA DB</span>
                
                <div class="searchbar"><i class="fa-solid fa-magnifying-glass"></i></div>

                <div class="burgermenu">
                    <span class="burgericon"></span>
                    <span class="burgericon"></span>
                    <span class="burgericon"></span>
                </div>

                <div class="menu">
                    <ul>
                        <li>
                            <a href="view/listFilms.php">MOVIES</a>
                        </li>
                        <li>
                            <a href="view/listActors.php">ACTORS</a>
                        </li>
                        <li>
                            <a href="view/listDirectors.php">DIRECTORS</a>
                        </li>
                        <li>
                            <a href="view/contact.php">CONTACT US</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <div id="content">
            <?= $title_secondary ?>
            <?= $content ?>
        </div>
    </main>
</body>
</html>