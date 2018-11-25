<?php
include ('funciones.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    $conexion = conectarBD();

    $usuario = $_POST['usuario'];
    $pass = md5($_POST['contraseña']);
    $loggin = loggin($usuario,$pass);
    if($loggin){
        $_SESSION['usuario'] = "$usuario";
        $_SESSION['idUsuario'] = buscarIdUsuario($usuario);
        header("location: ../index.php");
    } else {
        header("location: ../inicioSesion.php?error");
    }
}

