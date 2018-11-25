<?php
include('BBDD/funciones.php');
require_once('BBDD/objetoProducto.php');
session_start();

$error = "";
if (!isset($_SESSION['usuario'])) {
    if (isset($_GET['error'])) {
        $error = '<div class="alert alert-danger text-center" role="alert">El nombre de usuario o la contraseña no son correctos</div>';
    }
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


            <!-- /HOME -->

            <!-- section -->
            <div class="section">

                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="h1 text-center">Iniciar sesión</div>

                            <form action="BBDD/iniciarUsuario.php" method="post" class="col-md-8 col-md-offset-2 text-center">
                                <?php echo $error ?>    
                                    <div class="form-group text-left">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Antonio359" required>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="contraseña">Contraseña</label>
                                        <input type="password" name="contraseña"class="form-control" id="contraseña" placeholder="contraseña" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </form>
                        
                    </div>    
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>

            <!-- /section -->
        </div>
        <!-- section -->

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
    <?php
} else {
    header("location: index.php");
}
?>
</html>
