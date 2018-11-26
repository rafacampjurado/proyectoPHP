<?php
include('BBDD/funciones.php');
require_once('BBDD/objetoProducto.php');
session_start();

$idProd = $_GET['id'];
//Aquí estarán los detalles del producto
$producto = buscarProducto($idProd);
//print_r($producto);
$idUsuario = $_SESSION['idUsuario'];
$numOpiniones = contarOpinionesProducto($idProd);
$existeComent = exiteComentario($idUsuario, $idProd);
$paginas = pintarPaginas($idProd);
$objSerializado = serialize($producto);
$errorOpinion = $_GET['error'];
$recetas = buscarApi($producto->nombre);
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
        <script src="js/jquery-3.3.1.min.js"></script>
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
                    <!--  Product Details -->
                    <div class="product product-details clearfix">
                        <div class="col-md-6">
                            <div id="product-main-view">
                                <!--<div class="product-view">-->
                                    <img src="<?php echo $producto->img; ?>" alt="">
                                <!--</div>-->
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="product-body">

                                <h2 class="product-name"><?php echo $producto->nombre ?></h2>
                                <h3 class="product-price"><?php echo $producto->precio . " €"; ?></h3>
                               
                                <div>

                                    <!--<a href="#" class="fa fa-star"> 3 Review(s) / Add Review</a>-->
                                    <?php if ($numOpiniones != 0) { ?>
                                        <a href="#" class="fa fa-star"> <?php echo $numOpiniones; ?> Opinion/es</a>
                                    <?php } else { ?>
                                        <a href="#" class="fa fa-star"> Este producto aún no tiene opiniones.</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <p><strong>Disponibilidad:</strong> En Stock<br>
                                    <strong>Tipo:</strong><?php echo $producto->tipo ?><br>
                                    <strong>Recetas: </strong><a href="recetas.php?comida=<?php echo $producto->nombre;?>"><?php echo $producto->nombre;?></a></p>

                                <div class="product-options">
                                </div>

                                <div class="product-btns">
                                    <div class="qty-input">
                                        <?php
                                        if (!isset($_SESSION['usuario'])) {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Debes de estar registrado para poder comprar.
                                            </div>
                                        <?php } ?>
                                        <span class="text-uppercase">Cantidad: </span>

                                        <?php
                                        if (!isset($_SESSION['usuario'])) {
                                            $disabled = 'disabled=""';
                                        } else {
                                            $disabled = "";
                                        }
                                        ?>
                                        <form action="BBDD/carrito.php" method="POST">
                                            <input class="input" name="cantidad" type="number" min="1" max="5" <?php echo $disabled ?> value="1" >
                                            
                                            <input type="text" hidden="" value="añadir" name="accion">
                                            <input type="number" hidden="" value="<?php echo $idProd ?>" name="idProducto">
                                            <textarea name="objProducto" hidden=""><?php echo $objSerializado ?></textarea>
                                            <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                                        </form>
                                    </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="product-tab">
                                    <ul class="tab-nav">
                                        <li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
                                        <li><a data-toggle="tab" href="#tab2">Recetas</a></li>
                                        <li><a data-toggle="tab" href="#tab3">Opiniones (<?php echo $numOpiniones ?>)</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab1" class="tab-pane fade in active">
                                            <p>Beetroot water spinach okra water chestnut ricebean pea catsear courgette summer purslane.
                                                <br>Water spinach arugula pea tatsoi aubergine spring onion bush tomato kale radicchio turnip chicory salsify pea sprouts fava bean.
                                                <br>Dandelion zucchini burdock yarrow chickpea dandelion sorrel courgette turnip greens tigernut soybean radish artichoke wattle seed endive groundnut broccoli arugula.</p>
                                        </div>
                                        <div id="tab2" class="tab-pane fade">
                                            <?php echo $recetas; ?>
                                        </div>
                                        <div id="tab3" class="tab-pane fade in">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="product-reviews" id="comentarios">
                                                        <?php
                                                        if ($numOpiniones != 0) {
                                                            $opiniones = mostrarOpiniones($idProd);
                                                            echo $opiniones;
                                                        } else {
                                                            ?> 
                                                            <h4 class="text-uppercase">Este producto aún no posee opiniones</h4>
                                                            <?php
                                                            if (!isset($_SESSION['usuario'])) {
                                                                ?>
                                                                <h5 class="text-uppercase"><a href="inicioSesion.php">Inicia sesión</a> para escribir una opinión acerca del producto</h5>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <input type="number" class="idProducto" id="idProducto" value="<?php echo $idProd; ?>" hidden="hidden" name="idProducto">
                                                    <?php echo $paginas; ?>
                                                </div>
                                                <?php
                                                if (isset($_SESSION['usuario'])) {
                                                    if (!$existeComent) {
                                                        ?>
                                                        <div class="col-md-6">
                                                            <h4 class="text-uppercase">Escribe una opinión</h4>
                                                            <p>Tu correo electrónico no será visible.</p>
                                                            <form id="formOpinion"class="review-form" method="POST" action="enviarOpinion.php">
                                                                <?php
                                                                if ($errorOpinion == "err") {
                                                                    echo "<div class='alert alert-warning' role='alert'>Error</div>";
                                                                }
                                                                ?>
                                                                <div class="form-group">
                                                                    <textarea class="input" placeholder="Opinión" name="opinion"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-rating">
                                                                        <strong class="text-uppercase">Tu puntuación: </strong>
                                                                        <div class="stars">
                                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="number" id="idProducto" value="<?php echo $idProd; ?>" hidden="hidden" name="idProducto">
                                                                <input type="submit" class="primary-btn" name="btnComentario" id="btnComentario">

                                                            </form>

                                                            <!--<button class="primary-btn" name="btnComentario" id="btnComentario">Enviar</button>-->
                                                        </div>
                                                    <?php } else {
                                                        ?>
                                                        <div class="col-md-6 col-xs-3">
                                                            <h5 class="text-uppercase"<p>No puedes volver a comentar</p></h5>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="col-md-6 col-xs-3">
                                                        <h5 class="text-uppercase"><a href="inicioSesion.php">Inicia sesión</a> para escribir una opinión acerca del producto</h5>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /Product Details -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /section -->

            <!-- section -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Productos Relacionados</h2>
                            </div>
                        </div>
                        <!-- section title -->

                        <!-- Product Single -->

                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <?php
                        $relacionados = productosRelacionados($producto->tipo);
                        echo $relacionados;
                        ?>
                        <!-- /Product Single -->

                        <!-- Product Single -->

                        <!-- /Product Single -->

                        <!-- Product Single -->

                        <!-- /Product Single -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
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

    <script>
        $(".reviews-pages").on('click', 'button', function () {
            console.log("pulsado");
//            var pag = $(".numpag").data("pagina") ;
            var pag = ($(this).attr('id'));
            var id = $('.idProducto').val();
//            console.log("pagina "+pag);
//            console.log("id = "+id);
            var data = {};
            data.pag = pag;
            data.product = id;

            $.ajax({
                url: 'buscComentarios.php',
                type: 'post',
                data: data,
                success: function (response) {
                    var array = response;
                    if (array == "") {
                        console.log("no hay json");
                    } else {
                        console.log("si hay json");
                    }
//                    console.log(response);
                    $("#comentarios").html(response.data);


                }
            });
        });

    </script>
</html>