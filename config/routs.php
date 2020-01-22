<?php
if (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('templates/pages/all-movies-page.php');
            break;
        case 'nauja-kategorija':
            include ('templates/pages/add-genres-page.php');
            break;
        default:
    }
}else{
    include ('templates/pages/main-page.php');
}