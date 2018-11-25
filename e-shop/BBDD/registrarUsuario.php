<?php
include('funciones.php');

session_start();
if (!isset($_SESSION['usuario'])) {
    $conexion = conectarBD();
//    try {
//        $conexion = new PDO("mysql:host=localhost;dbname=foodnation;charset=utf8", "root", "");
//    } catch (PDOException $ex) {
//        echo "No se ha podido establecer conexión";
//        die($error->getMessage());
//        $conexion = NULL;
//    }

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

//----------------------------MYSQLI------------------------------------------------
//session_start();
//$conexion =  new mysqli("localhost","root","");
//$conexion->select_db("foodnation");
//$conexion->set_charset("utf8") ;
////--------------------------------------------------------------------------------------------------------------------------------
//$usuario = $_POST['usuario'];
//$email = $_POST['email'];
//$pass = $_POST['email'];
//$nombre = $_POST['nombre'];
//$apell = $_POST['apellidos'];
//utf8_encode($usuario);
//utf8_encode($nombre);
//utf8_encode($apell);
////---------------------------------------------------------------------------------------------------------------------------
//
//if(!isset($_SESSION['usuario'])){// Si  hay usuario autenticado
//$sql = "insert into usuarios  (nombre,apellidos,email,usuario,password) values ('$nombre','$apell','$email','$usuario','".md5($pass)."');";
//
//$conexion->query($sql);
//header("Location: ../registro.php?fin");
//    print_r($sql);
//    if(print_r($conexion->error)){
//        header("Location: ../index.php?errorMail");
//    }
//} else {
//	header("Location: ../index.php");
//}
//
//$conexion->close();