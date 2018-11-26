<?php
include('BBDD/funciones.php');
require_once('BBDD/objetoProducto.php');
session_start();

$apiKey = "252cc403756b3da734c595016b67a914";
//$fodd = "tomatoes";
//$food = $_POST['comida'];
$url = "https://www.food2fork.com/api/search?key=$apiKey&q=Potatoes&page=1";
$response = file_get_contents($url);

$resultado = json_decode($response,true);

for ($index = 0; $index < $resultado['count']; $index++) {
    $titulo = $resultado['recipes'][$index]['title'];
    $id = $resultado['recipes'][$index]['recipe_id'];
    $imagen = $resultado['recipes'][$index]['image_url'];
    $url = $resultado['recipes'][$index]['source_url'];
    $res .= <<<EX
<div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href='$url'"<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button></a>
                                            <img src="$imagen" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h1 class="product-name"><a href="#">$nombre</a></h1>
                                        </div>
                                    </div>
                                </div>
                <div class="clearfix visible-sm visible-xs"></div>
EX;
}
echo $res;