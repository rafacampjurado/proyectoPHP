<?php
include('BBDD/funciones.php');
require_once('BBDD/objetoProducto.php');
session_start();

//Aquí estarán los detalles del producto
//print_r($producto);
$idUsuario = $_SESSION['idUsuario'];
$finalizar = $_GET["fin"];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>E-SHOP HTML Template</title>

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
                    <div class="col-md-2">
                    </div>
                    <div id="listado"class="col-md-9">
                        <!--  Product Details -->
                        <?php
                        if (!empty($_SESSION['carrito'])) {


                            if ($finalizar == "fin") {
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Se ha realizado correctamente la compra.
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="h1 text-center">
                                    Listado de productos
                                </div>
                                <table class="table">
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col"></th>
                                        
                                    </tr>
                                    <?php
                                    echo pintarListaCarrito();
                                }
                                ?>
                            </table>
                            <?php if (!isset($finalizar)) { ?>
                                <a href="BBDD/finCompra.php?fin=fin"<button class="primary-btn text-right">Finalizar compra</button></a>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="alert alert-warning" role="alert">
                                    Tu carrito está vacío.
                                </div>
                            <?php
                        }
                        ?>
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

<!--    <script>
        $("#listado").on('click', 'button', function () {
            console.log("pulsado");
            //            var pag = $(".numpag").data("pagina") ;
            var id = ($(this).attr('id'));
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

    </script>-->

</html>

