<?php
include('BBDD/funciones.php');
session_start();
$idUsuario = $_SESSION['idUsuario'];
$opinion = $_GET['opinion'];
$rating = $_GET['rating'];
if($rating == ""){
    $rating = 0;
}
$idProducto = $_GET['idProducto'];
//echo $idUsuario."  ".$idProducto." ".$opinion." ".$rating."<br>";
//$idUsuario = 3;
//$opinion = "pruebabbbbb";
//$ratin = 2;
//$idProducto = 5;
//echo $id."  ".$opinion. "   ".$ratin;
$consulta = añadirOpinion($idUsuario,$idProducto,$opinion,$rating);
if($consulta == 1){
   header('Location: ' . $_SERVER['HTTP_REFERER']);
}else {
//    echo "error";
    header('Location: ' . $_SERVER['HTTP_REFERER']."?error=err");
    
}
//echo $consulta;
//echo "id:$idUsuario<br>opinion: $opinion<br>rating: $rating<br>producto: $idProducto";