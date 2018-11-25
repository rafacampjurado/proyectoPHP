<?php

include('funciones.php');
require_once('objetoProducto.php');
session_start();

$apikey = "x-app-key=65b0122be4ad78a0a5ab10e7be80bb03";
$appId = "x-app-id=09edd850";
//$food = "nix_item_id=513fc9e73fe3ffd40300109f";
//$food = "upc=2";
$url = "https://trackapi.nutritionix.com/v2/search/item?" . implode("&", array($apikey,$appId, $food));
//$url = "https://trackapi.nutritionix.com/v2/search/item?".$food;
//$url = "https://trackapi.nutritionix.com/v2/natural/nutrients";
//header('Content-Type: application/json,x-app-id:'.$appId.',x-app-key:'.$apikey.'');
//header('Content-Type: application/json');

//$response = file_get_contents($url);

//$deals = json_encode($response);
//$deals = json_decode($response);

//------------------------------------------------------
//$apikey = "x-app-key=65b0122be4ad78a0a5ab10e7be80bb03";
//$appId = "x-app-id=09edd850";
$food = "query=cheese";
$url = "https://trackapi.nutritionix.com/v2/search/instant?$food" ; // . implode("&", array($appId,$apikey, $food));
echo $url ;
//$response = file_get_contents($url);
//header('Content-Type: application/json');
//$deals = json_encode($response,TRUE);

//print_r($deals);
header("Content-Type: application/json") ;
header("x-app-key='65b0122be4ad78a0a5ab10e7be80bb03'"); 
header("x-app-id='09edd850'") ;

$response = file_get_contents($url);
$deals = json_encode($response);
//$resultado = json_decode($deals);
echo($deals);


//-----------------------------------------------------------------------------
//$resultado = listadoProductos("Fruta");
//echo $resultado;
//$tipo = "fruta";
//$conexion = conectarBD();
//$sql = $conexion->prepare("SELECT nombre,tipo,precio,Img from productos where tipo=:tipo");
////$sql = $conexion->prepare("SELECT nombre,tipo,precio,Img from productos");
//$sql->bindParam(':tipo', $tipo);
//$sql->execute();
//$resultado = $sql->fetchAll();
//foreach ($resultado as $value) {
//    echo "nombre: ".$value['nombre']."<br>";
//    echo "tipo: ".$value['tipo']."<br>";
//    echo "precio: ".$value['precio']."<br>";
//    echo "imagen: ".$value['Img']."<br>";
//    echo "------------------------<br>";
//}


















//$apikey = "65b0122be4ad78a0a5ab10e7be80bb03";
//$apiID = "09edd850";
//Content-Type:application/json, x-app-id:NutritionixAppID, x-app-key:NutritionixAppKey
//$header = [
//"Content-Type"
//]
//$result = $rapid->call('Nutritionix', 'searchFoods', [
//"applicationSecret" => "65b0122be4ad78a0a5ab10e7be80bb03",
//"foodDescription" => "potatoes",
//"applicationId" => "09edd850"
//]);



//$producto = buscarProducto(1);
//echo $producto."<br>";
////$producto = new objtProducto('tomate','0.50','fruta');
//echo $producto->img;











//$pass = md5("123");
//logout();
////loggin('test',$pass);
//if(isset($_SESSION['usuario'])){
//    echo "existe ".$_SESSION['usuario'];
//} else {
//    echo "no existe";
//}
//logout($_SESSION['usuario']);

//$existe = existeUsuario("adad");
////$existe = false;
//if($existe){
//    echo "existe";
//} else {
//    echo "no existe";
//}






//try {
//    $conexion = new PDO("mysql:host=localhost;dbname=foodnation;charset=utf8","root","");
//} catch (Exception $ex) {
//    echo "No se ha podido establecer conexión";
//    die($error->getMessage());
//    $conexion = NULL;
//
//}
//$usuario = "pruebaPDO";
//$email = "pruebaPDO@pdo";
//$pass = md5("PDO");
//$nombre = "Álvaro";
//$apell = "sán";
//
//$sql = $conexion->prepare ("Insert into usuarios  (nombre,apellidos,email,usuario,password) values (:nombre, :apell, :email, :usuario, :pass);");
//$sql->bindParam(':nombre', $nombre);
//$sql->bindParam(':apell', $apell);
//$sql->bindParam(':email', $email);
//$sql->bindParam(':usuario', $usuario);
//$sql->bindParam(':pass', $pass);
//$sql->execute();
//print_r($sql);
// $conexion = NULL;

//header("location: ../registro.php?fin");