<?php
if (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('templates/pages/all-movies-page.php');
            break;
        case 'valdymasz':
            include ('templates/pages/add-genres-page.php');
            break;
        case 'valdymasf':
            include ('templates/pages/add_movie.page.php');
        default:
    }
}else{
    include ('templates/pages/main-page.php');
}