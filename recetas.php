<?php
include ('BBDD/funciones.php');
require_once 'BBDD/objetoProducto.php';
session_start();
$comida = $_GET['comida'];
$recetas = buscarApi($comida);
if (isset($_SESSION['usuario'])) {
    
    ?>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

            <title>FoodNation</title>

            <!-- Google font -->
            <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

            <!-- Bootstrap -->
            <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

            <!-- Slick -->
            <link type="text/css" rel="stylesheet" href="css/slick.css" />
            <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

            <!-- nouislider -->
            <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

            <!-- Font Awesome Icon -->
            <link rel="stylesheet" href="css/font-awesome.min.css">
            
            <!-- Custom stlylesheet -->
            <link type="text/css" rel="stylesheet" href="css/style.css" />
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <link href="img/favicon.ico" rel="icon" type="image/x-icon" />
        </head>


        <body>
            <!-- HEADER -->
            <?php require_once 'header.php'; ?>
            <!-- /HEADER -->
            <!-- NAVIGATION -->
            <!-- /NAVIGATION -->

            <!-- BREADCRUMB -->
            <!-- /BREADCRUMB -->

            <!-- section -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-2">
                        </div>

                        <div id="listado"class="col-md-9">
                            <div class="h1 text-center">Recetas</div>
                            <!--  Product Details -->
                            <?php echo $recetas;?>
                        </div>

                        <!-- /Product Details -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /section -->

            <!-- section -->

            <!-- /section -->


            <!-- FOOTER -->
            <?php require_once 'footer.php'; ?>
            <!-- /FOOTER -->

            <!-- jQuery Plugins -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/slick.min.js"></script>
            <script src="js/nouislider.min.js"></script>
            <script src="js/jquery.zoom.min.js"></script>
            <script src="js/main.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        </body>

    </html>
    <?php
} else {
    header("location: ../index.php");
}
    