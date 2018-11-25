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
//        header("location: ../index.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: ../inicioSesion.php?error");
    }
}

