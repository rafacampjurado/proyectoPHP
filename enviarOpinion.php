<?php
include('BBDD/funciones.php');
session_start();
$idUsuario = $_SESSION['idUsuario'];
$opinion = $_POST['opinion'];
$rating = $_POST['rating'];
if($rating == ""){
    $rating = 0;
}
$idProducto = $_POST['idProducto'];

$consulta = añadirOpinion($idUsuario,$idProducto,$opinion,$rating);
if($consulta == 1){
   header('Location: ' . $_SERVER['HTTP_REFERER']);
}else {
    header('Location: ' . $_SERVER['HTTP_REFERER']."?error=err");
    
}
