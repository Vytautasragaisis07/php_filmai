<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templates/css/simple-sidebar.css" rel="stylesheet">

    <!-- Style css -->
    <link href="templates/css/style.css" rel="stylesheet">
</head>

<body>



<div class="d-flex" id="wrapper">

    <?php include"_partials/header.view.php"?>
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <?php include"_partials/nav.view.php"?>
        <main class="container-fluid">
            <?php
                require($_SERVER['DOCUMENT_ROOT'].'/Vytautas/php_filmai/config/routs.php');
                //echo($_SERVER['DOCUMENT_ROOT'].'/Vytautas/php/Penkta/config/routs.php');
                ?>
        </main>

        <div class="container-fluid">
            <h1 class="mt-4">Apie projektą</h1>
            <p>Filmų paieškos aplikacija</p>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="templates/js/jquery.min.js"></script>
<script src="templates/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
