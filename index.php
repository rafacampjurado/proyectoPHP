<?php session_start();
 include 'BBDD/funciones.php';
 require_once 'BBDD/objetoProducto.php';
?>
<!DOCTYPE html>
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
        <link href="img/favicon.ico" rel="icon" type="image/x-icon" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->

    </head>

    <body>
        <!-- HEADER -->
        <?php require_once 'header.php'; ?>
        <!-- /HEADER -->

        <div id="home">
            <!-- container -->
            <div class="container">
                <!-- home wrap -->
                <div class=" col-sm-9 col-sm-offset-2 text-center ">
                    <!-- home slick -->
                    <div id="home-slick">
                        <!-- banner -->
                        <div class="banner banner-1">
                            <img src="./img/banerFruta.jpg" alt="Frutas">
                            <div class="banner-caption text-center">
                                <h1 style="color: White">Frutas</h1>
                                <!--<h3 class="white-color font-weak">Frutas</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Fruta">Comprar ahora</a></button>
                            </div>
                        </div>
                        <!-- /banner -->
                        <div class="banner banner-1">
                            <img src="./img/bannerCarnes.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color: White">Carnes</h1>
                                <!--<h3 class="white-color font-weak">Texto2</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Carne">Comprar</a></button>
                            </div>
                        </div>
                        <!-- banner -->
                        <div class="banner banner-1">
                            <img src="./img/bannerSnacks.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color: White">Aperitivos</h1>
                                <!--<h3 class="white-color font-weak">Texto2</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Aperitivos">Comprar ahora</a></button>
                            </div>
                        </div>
                        <div class="banner banner-1">
                            <img src="./img/bannerHortalizas.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color: White">Hortalizas</h1>
                                <!--<h3 class="white-color font-weak">Texto2</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Hortaliza">Comprar ahora</a></button>
                            </div>
                        </div>
                        <div class="banner banner-1">
                            <img src="./img/bannerDulces.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color: white">Dulces</h1>
                                <!--<h3 class="white-color font-weak">Texto2</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Dulce">Comprar ahora</a></button>
                            </div>
                        </div>
                        <div class="banner banner-1">
                            <img src="./img/bannerPescado.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color: white">Pescado</h1>
                                <!--<h3 class="white-color font-weak">Texto2</h3>-->
                                <button class="primary-btn"><a href="listProducto.php?tipo=Pescado">Comprar ahora</a></button>
                            </div>
                        </div>
                        <!-- /banner -->

                        <!-- banner -->

                        <!-- /banner -->
                    </div>
                    <!-- /home slick -->
                </div>
                <!-- /home wrap -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOME -->

        <!-- section -->
        
        <!-- /section -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Últimos productos vendidos</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-1 custom-dots"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /section-title -->

                    <!-- banner -->
                    
                    <!-- /banner -->

                    <!-- Product Slick -->
                    <div class="col-md-10 col-sm-6 col-xs-6">
                        <div class="row">
                            <div id="product-slick-1" class="product-slick">
                                <!-- Product Single -->
                                <?php
                                $ultimosProductos = ultimosProductosVendidos();
                                echo $ultimosProductos;
                                ?>
                                <!-- /Product Single -->

                                <!-- Product Single -->
                               
                                <!-- /Product Single -->

                                <!-- Product Single -->
                                
                                <!-- /Product Single -->

                                <!-- Product Single -->
                                
                                <!-- /Product Single -->
                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->

                <!-- row -->
               
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        
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

    </body>

</html>
