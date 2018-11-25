<?php
session_start();
include('funciones.php');
require_once ('objetoProducto.php');
$idUsuario = $_SESSION['idUsuario'];
echo "usuario: " . $_SESSION['usuario'] . " <br>id: $idUsuario";
?>
<html>
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

    </head>
    <?php
    $producto = new objtProducto(1, 'manzana', 1.3, 'fruta', '/img');
    $productoDos = new objtProducto(3, 'aguacate', 20.00, 'fruta', '/img');
    $productoTres = new objtProducto(4, 'sandia', 5.00, 'fruta', '/img');
//    ---------------------------------------------------------------
    $longitudCarrito = count($_SESSION['carrito'][0]);
    echo "<br> Longitud del carrito = " . $longitudCarrito;
//    ---------------------------------------------------------------
    $primerProducto = serialize($producto);
    $segundoProducto = serialize($productoDos);
    $tercerProducto = serialize($productoTres);
//    -----------------------------------------------------
    $array = (array)$producto;
//    ----------------------------------------------------------
//    $_SESSION['carrito'][0][$longitudCarrito] = $array;
//    -----------------------------------------------------------
//        unset($_SESSION['carrito']); //borra
    echo "<br>------------------------------------------------------------<br>";
    echo "CARRITO : <br>";
    var_dump($_SESSION['carrito']);


    echo "<p>--------------------------------------------------</p>";
    ?>
    <form action="testObjeto.php" method="POST">
        <textarea name="objeto" ><?php echo $tercerProducto; ?></textarea>
        <input type="submit">

    </form>