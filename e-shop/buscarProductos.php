<?php

include('BBDD/funciones.php');
include('BBDD/objetoProducto');

//$id = $_GET['id'];
//$id = $_POST['id'];
$tipo = $_POST['tipo'];
//$pag = $_POST['pag'];
$pag = $_POST['pag'];
//$pag += 1;
$maxPaginas = numPagProductos($tipo);
$conexion = conectarBD();
$sql = $conexion->prepare("SELECT * from productos where tipo=:tipo LIMIT 0,$pag");
$sql->bindParam(':tipo', $tipo);
$sql->execute();
$resultado = $sql->fetchAll();
//$arrayResultado = array();
//$numFilas = $sql->fetchColumn();
$json = [
    "data" => ""];

foreach ($resultado as $value) {

    $nombre = $value['Nombre'];
    $id = $value['idProducto'];
    $tipo = $value['Tipo'];
    $precio = $value['Precio'];
    $imagen = $value['Img'];
    if (isset($nombre)) {
        $res .= <<<EX
<div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href='detalles.php?id=$id'"<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button></a>
                                            <img src="$imagen" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h1 class="product-name"><a href="#">$nombre</a></h1>
                                            <h4 class="product-price">$precio €</h4>
                                        </div>
                                    </div>
                                </div>
                <div class="clearfix visible-sm visible-xs"></div>
EX;
    }
//    $arrayResultado [] = array('opinion' => $res);
}
$json["data"] = $res;
   $json["pag"] = $pag + 6;

header("Content-Type: application/json");
//$json = json_encode($arrayResultado);
//echo $json;
echo json_encode($json);
