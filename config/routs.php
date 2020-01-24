<?php
if (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('templates/pages/all-movies-page.php');
            break;
        case 'zanrai':
            include('templates/pages/by_genre.page.php');
            break;
        case 'valdymasf':
            include ('templates/pages/add_movie.page.php');
            break;
        case 'atnaujinti':
            include ('templates/pages/update.page.php');
            break;
        case 'salinimas':
            include ('templates/pages/delete_film.page.php');
            break;
        case 'paieska':
            include ('templates/pages/search.page.php');
            break;


        default:
    }
}else{
    include ('templates/pages/main-page.php');
}