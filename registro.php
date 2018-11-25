<?php session_start();
include("BBDD/funciones.php");
require_once("BBDD/objetoProducto.php");
if (!isset($_SESSION['usuario'])) {
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
        <?php 
         if (isset($_GET['error'])) {
             $texto = '<div class="alert alert-danger text-center" role="alert">El nombre de usuario o el correo electrónico ya existe</div>';
             $aviso = 'alert alert-danger';
         } else {
             $texto = "";
             $aviso = "";
         }
        ?>
        <!-- /HEADER -->


        <!-- /HOME -->

        <!-- section -->
        <div class="section">

            <!-- container -->
            <div class="container">
                <div class="h1 text-center">Registro</div>
                <!-- row -->
                <?php if (!isset($_GET['fin'])) { ?>
                    <form action="BBDD/registrarUsuario.php" method="post">
                        <legend>Datos sobre la cuenta</legend>
                        <?php 
                        echo $texto;   
                        ?>
                        <div class="form-group text-left <?php echo $aviso?>">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="prueba@prueba.prueba" required>
                            <small id="emailHelp" class="form-text text-muted">Este correo debe de ser válido.</small>
                        </div>
                        <div class="form-group text-left <?php echo $aviso?>">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Antonio359" required>
                            <small id="emailHelp" class="form-text text-muted">Este será el nombre con el que iniciará sesión</small>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" name="contraseña"class="form-control" id="contraseña" placeholder="contraseña" required>
                        </div>
                        <legend>Datos personales</legend>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="usuario" placeholder="Antonio">

                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Sánchez">

                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required>
                                Acepta los términos.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-success ">El registro se ha completado</div>
                <?php } ?>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

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
    }else{
header("location: index.php");
    }
?>
</html>
