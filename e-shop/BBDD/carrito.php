<?php

session_start();
include('funciones.php');
require_once 'objetoProducto.php';

$accion = $_POST['accion'];
if (empty($accion)) {
    $accion = $_GET['accion'];
    $idProducto = $_GET['id'];
}
$cantidad = $_POST['cantidad'];
$producto = $_POST['idProducto'];
$longitudCarrito = count($_SESSION['carrito'][0]);

$objSerializado = $_POST['objProducto'];
$objDeserializado = unserialize($objSerializado);
$arrayObjeto = (array) $objDeserializado;
// unset($_SESSION['carrito']);
//echo "<br>Ultima key = ";
$ultimaKey = end(array_keys($_SESSION['carrito'][0]));
if ($ultimaKey == "") {
    $ultimaKey = 0;
}
//echo($ultimaKey);
$proximaKey = $ultimaKey + 1;
//echo "<br>Próxima Key a añadir : " . $proximaKey . "<br>";

if (isset($_SESSION['usuario'])) {
    switch ($accion) {
        case 'añadir':
//        echo "La función elegida es 'añadir' <br>";
//        echo "La cantidad = " . $cantidad . "<br>";
//        echo "Y el producto a añadir = " . $producto . "<br>";
//        echo "-------Producto----------<br>";
//        print_r($arrayObjeto);
//        echo "<br>---------------------------<br>";

            for ($index = 0; $cantidad > $index; $index++) {
                $_SESSION['carrito'][0][$proximaKey] = $arrayObjeto;
                $proximaKey++;
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;
        case 'borrarTodo':
            unset($_SESSION['carrito']);
            header('Location: ../verCarrito.php');
            break;
        case 'borrar':

            if ($longitudCarrito == 1) {
                unset($_SESSION['carrito']);
                header('Location: ../verCarrito.php');
            } else {
                unset($_SESSION['carrito'][0][$idProducto]);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;
        case 'test':
            echo "<br>Próxima Key a añadir : " . $proximaKey . "<br>";
            echo "Ultima key = $ultimaKey <br>";
            echo "longitud variable carrito = " . $longitudCarrito . "<br>";
            echo "longitud carrito sesion = " . count($_SESSION['carrito'][0]) . "<br>";
            echo "-------------Array carrito en sesión-------------<br>";
            var_dump($_SESSION['carrito'][0]);
            echo "-------------FIN Array carrito en sesión-------------<br>";
            echo '<a href=../index.php><button>Volver</button></a>';
            break;

        default:
            break;
    }
} else {
    header("location: ../index.php");
}