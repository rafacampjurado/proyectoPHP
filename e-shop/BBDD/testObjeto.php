<?php
session_start();
include('funciones.php');
require_once 'objetoProducto.php';
$objeto = $_POST['objeto'];
$seriaObjeto = unserialize($objeto);
$resultado = (array)$seriaObjeto;
echo "PRODUCTO : <br>";
var_dump($resultado);
echo "---------------------------<br>";
//unset($_SESSION['carrito']);
//var_dump($_SESSION['carrito']);
$longitudCarrito = count($_SESSION['carrito'][0]);
echo "longitud del carrito = $longitudCarrito <br>-----------------------------------<br>";

//----------------------------------------------------------
if(($_SESSION['carrito'][0] == "") || (empty($_SESSION['carrito']))){
    echo "no contiene ningún valor";
    $_SESSION['carrito'][0][$longitudCarrito] = $resultado;
} else {
   $_SESSION['carrito'][0][$longitudCarrito] = $resultado;
}
echo "<br>--------------------------<br>CARRITO:";
var_dump($_SESSION['carrito']);
