<?php
include('funciones.php');

session_start();
if (!isset($_SESSION['usuario'])) {
    $conexion = conectarBD();

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pass = md5($_POST['contraseña']);
    $nombre = $_POST['nombre'];
    $apell = $_POST['apellidos'];
        $sql = $conexion->prepare("Insert into usuarios  (nombre,apellidos,email,usuario,password) values (:nombre, :apell, :email, :usuario, :pass);");
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apell', $apell);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':usuario', $usuario);
        $sql->bindParam(':pass', $pass);

        if($sql->execute()){
            header("location: ../registro.php?fin");
//            echo "se ha insertado con exito";
        } else {
            header("location: ../registro.php?error");
//            echo "no se ha insertado";
        }
    
}
