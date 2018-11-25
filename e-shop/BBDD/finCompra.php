<?php

include ('funciones.php');
session_start();
$id = $_SESSION['idUsuario']; //por algun motivo no coge el valor de Sesión, da fq.
$valorKey = end(array_keys($_SESSION['carrito'][0]));
//echo "Usuario: $id";
//echo "<br>Ultimo id:" . ultimoIdFactura();
if (isset($_SESSION['carrito'])) {
    if (insertarFactura($id)) {
//    echo "<br>Realizado con éxito</br>";
//    echo "<br>Ultimo id:" . ultimoIdFactura();
        $idFactura = ultimoIdFactura();
        echo "<p></p>";
        $conexion = conectarBD();
        $sql = $conexion->prepare("Insert into facturas_productos VALUES(:idFactura, :idProducto)");
        for ($index = 0; $valorKey >= $index; $index++) {
            $producto = $_SESSION['carrito'][0][$index]['idProduct'];
            if ($producto != "") {
                $sql->bindParam(":idProducto", $producto);
                $sql->bindParam(":idFactura", $idFactura);
                $sql->execute();
            }
        }
        unset($_SESSION['carrito']);
    }
    header("location: ../verCarrito.php?fin=fin");
//    header("location: ../index.php?fin=fin");
}
header("location: ../verCarrito.php");
//echo "<pre>";
//var_dump($_SESSION['carrito'][0]);
//echo "</pre>";
