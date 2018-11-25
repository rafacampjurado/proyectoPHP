<?php

include('BBDD/funciones.php');
include('BBDD/objetoProducto');

//$id = $_GET['id'];
//$id = $_POST['id'];
$id = $_POST['product'];
//$pag = $_POST['pag'];
$pag = $_POST['pag'];
//$pag += 1;
$conexion = conectarBD();
$sql = $conexion->prepare("SELECT usuario, Opinion, Fecha, Puntuacion FROM `opiniones` 
inner JOIN usuarios on opiniones.idUsuario=usuarios.idUsuario where idProducto=:id LIMIT $pag,3");
$sql->bindParam(':id', $id);
$sql->execute();
$resultado = $sql->fetchAll();
//$arrayResultado = array();
$json =  [ 
    "data" => ""];
foreach ($resultado as $value) {
    $nombre = $value['usuario'];
    $opinion = $value['Opinion'];
    $fecha = $value['Fecha'];
    $puntuacion = $value['Puntuacion'];
    $res .= <<<EX
                <div class="single-review">
    <div class="review-heading">
        <div><a href="#"><i class="fa fa-user"></i> $nombre</a></div>
        <div><a href="#"><i class="fa fa-clock"></i> $fecha</a></div>
        <div class="review-rating pull-right">
EX;
    for ($index = 0; $index < $puntuacion; $index++) {
        $res .= '<i class="fas fa-star"></i>';
    }
    if (5 - $puntuacion > 0) {
        for ($index = 0; $index < 5 - $puntuacion; $index++) {
            $res .= '<i class="fa fa-star-o empty"></i>';
        }
    }
    $res .= <<<EX
        </div>
        </div>
        <div class="review-body">
        <p>$opinion</p>
        </div>
        </div>
EX;
//    $arrayResultado [] = array('opinion' => $res);
    $json["data"] = $res;
}
header("Content-Type: application/json");
//$json = json_encode($arrayResultado);
//echo $json;
echo json_encode($json);
