<?php
include('BBDD/funciones.php');
session_start();
//require_once('objetoProducto.php');
$tipo = $_GET['tipo'];
$listado = listadoProductos($tipo);
//---------------------------Búsqueda en base de datos de todos los productos que coincidan con el tipo--------------------
//Una vez mostrados los productos se añadirán un botón de detalles que llevará a otra página, desde la cual se mostraran los detalles (BBDD + API)-------
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
        <?php require_once 'nav.php'; ?>
        <!-- /NAVIGATION -->

        <!-- BREADCRUMB -->

        <!-- /BREADCRUMB -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-2">
                        <!-- aside widget -->

                        <!-- /aside widget -->

                        <!-- aside widget -->

                        <!-- aside widget -->

                        <!-- aside widget -->

                        <!-- /aside widget -->

                        <!-- aside widget -->

                        <!-- /aside widget -->

                        <!-- aside widget -->

                        <!-- /aside widget -->

                        <!-- aside widget -->

                        <!-- /aside widget -->

                        <!-- aside widget -->

                        <!-- /aside widget -->
                    </div>
                    <!-- /ASIDE -->

                    <!-- MAIN -->
                    <div id="main" class="col-md-9 main">
                        <!-- store top filter -->

                        <!-- /store top filter -->

                        <!-- STORE -->
                        <!--<div id="store">-->
                        <!-- row -->
                        <div class="row" id="listado">
                            <!-- Product Single -->

                            <?php echo $listado; ?>
                        </div>
                        <input type="number" hidden="" class="pagina" id="pagina" name="pagina" value="12">
                        <button id="<?php echo $tipo;?>" class="primary-btn add-to-cart">Mostrar más</button>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /MAIN -->
                </div>
                <!-- /Product Single -->
            </div>
            <!-- /row -->
            <!--</div>-->
            <!-- /STORE -->

            <!-- store bottom filter -->

            <!-- /store bottom filter -->
        </div>
        <!-- /MAIN -->
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

</body>

<script>
    $("#main").on('click', 'button', function () {
        console.log("pulsado");
        var tipo = ($(this).attr('id'));
        var pag = $('#pagina').val();
            console.log("tipo "+tipo);
            console.log("pag "+pag);
        var data = {};
        data.tipo = tipo;
        data.pag = pag;

        $.ajax({
            url: 'buscarProductos.php',
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
                $("#listado").html(response.data);
                $("#pagina").val(response.pag);


            }
        });
    });

</script>
</html>

