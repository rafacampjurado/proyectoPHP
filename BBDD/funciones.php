<?php

include('objetoProducto.php');

//session_start();

function conectarBD() {
    $conexion;
    $error;
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=foodnation;charset=utf8", "root", "");
//        $conexion = new PDO("mysql:host=sql307.epizy.com;dbname=epiz_23036069_foodnation;charset=utf8", "epiz_23036069", "34wYMq1gJcsvM");
        return $conexion;
    } catch (PDOException $ex) {
        echo "No se ha podido establecer conexión";
        die($error->getMessage());
        $conexion = NULL;
    }
}

function existeUsuario($usr) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT count(usuario) from usuarios where usuario=:usuario;");
    $sql->bindParam(':usuario', $usr);
    $sql->execute();
    $resultado = $sql->fetchColumn();
    if ($resultado == 1) {
        return true;
    } else {
        return false;
    }
}

function loggin($usr, $pass) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT password from usuarios where usuario=:usuario;");
    $sql->bindParam(':usuario', $usr);
    $sql->execute();
    $resultado = $sql->fetch();
    if ($resultado['password'] == $pass) {
//        return $_SESSION['usuario'] = "$usr";
        return true;
    } else {
        return false;
    }
}

function buscarIdUsuario($usr) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT idUsuario from usuarios where usuario=:usuario;");
    $sql->bindParam(':usuario', $usr);
    $sql->execute();
    $resultado = $sql->fetch();
    return $resultado['idUsuario'];
}

function logout() {
    unset($_SESSION['usuario']);
}

function buscarProducto($id) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT nombre,tipo,precio,Img from productos where idProducto=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $resultado = $sql->fetch();
    if (!$resultado == "") {
        $nombre = $resultado['nombre'];
        $precio = $resultado['precio'];
        $tipo = $resultado['tipo'];
        $img = $resultado['Img'];
        $producto = new objtProducto($id, $nombre, $precio, $tipo, $img);
//        return $producto;
    } else {
        $producto = "error";
    }
    return $producto;
}

function contarOpinionesProducto($id) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT count(idOpinion) from opiniones where idProducto=:id;");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $resultado = $sql->fetchColumn();
    return $resultado;
}

function mostrarOpiniones($id) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT usuario, Opinion, Fecha, Puntuacion FROM `opiniones` 
inner JOIN usuarios on opiniones.idUsuario=usuarios.idUsuario where idProducto=:id LIMIT 0,3");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $resultado = $sql->fetchAll();
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
            $res .= '<i class="fa fa-star"></i>';
        }
        if (5 - $puntuacion > 0) {
            for ($index = 0; $index < 5 - $puntuacion; $index++) {
                $res .= '<i class="fa fa-star empty"></i>';
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
    }
    return $res;
}

function listadoProductos($tipo) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT * from productos where tipo=:tipo LIMIT 0,6");
//$sql = $conexion->prepare("SELECT nombre,tipo,precio,Img from productos");
    $sql->bindParam(':tipo', $tipo);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $value) {
        $nombre = $value['Nombre'];
        $id = $value['idProducto'];
        $tipo = $value['Tipo'];
        $precio = $value['Precio'];
        $imagen = $value['Img'];
//        echo "------------------------<br>";
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
    return $res;
}

function exiteComentario($idUsuario, $idProducto) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("SELECT count(idOpinion) from opiniones where idUsuario = :idUsuario AND idProducto = :idProducto");
    $sql->bindParam(':idUsuario', $idUsuario);
    $sql->bindParam(':idProducto', $idProducto);
    $sql->execute();
    $resultado = $sql->fetchColumn();
    if ($resultado != 0) {
        return true;
    } else {
        return false;
    }
}

function añadirOpinion($idUsuario, $idProducto, $opinion, $puntuacion) {
    $conexion = conectarBD();
    if (!exiteComentario($idUsuario, $idProducto)) {
        $sql = $conexion->prepare("Insert into opiniones (idUsuario,idProducto,Opinion,Puntuacion) VALUES(:idUsuario,:idProducto,:opinion,:puntuacion)");
        $sql->bindParam(':idUsuario', $idUsuario);
        $sql->bindParam(':idProducto', $idProducto);
        $sql->bindParam(':opinion', $opinion);
        $sql->bindParam(':puntuacion', $puntuacion);
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
//        return $sql;
    }
}

function numComentarios($idProducto) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("Select count(idOpinion) from opiniones where idProducto = :id");
    $sql->bindParam(":id", $idProducto);
    $sql->execute();
    $resultado = $sql->fetchColumn();
    return $resultado;
}

function numPaginas($idProducto) {
    $numFilas = numComentarios($idProducto);
    $numPaginas;
    while ($numFilas > 0) {
        $numFilas -= 3;
        $numPaginas++;
    }
    return $numPaginas;
}

function numProductos($tipo) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("Select count(idProducto) from productos where tipo = :tipo");
    $sql->bindParam(":tipo", $tipo);
    $sql->execute();
    $resultado = $sql->fetchColumn();
    return $resultado;
}

function numPagProductos($tipo) {
    $numFilas = numComentarios($tipo);
    $numPaginas;
    while ($numFilas > 0) {
        $numFilas -= 3;
        $numPaginas++;
    }
    return $numPaginas;
}

function pintarPaginas($idProducto) {
    $numPaginas = numPaginas($idProducto);
    if ($numPaginas > 0) {
        $resultado = '<ul class="reviews-pages">';
        for ($index = 0; $numPaginas > $index; $index++) {
            if ($index == 0) {
                $resultado .= '<li class="pag"><button id="' . ($index) . '" class="numpag primary-btn" data-pagina="' . ($index + 1) . '">' . ($index + 1) . '</button></li>';
            } else {
                $resultado .= '<li class="pag"><button id="' . ($index + 2) . '" class="numpag primary-btn" data-pagina="' . ($index + 1) . '">' . ($index + 1) . '</button></li>';
            }
        }
        $resultado .= '<li><i class="fa fa-caret-right"></i></li>
                </ul>
                <p></p>';
    } else {
        $resultado = "";
    }
    return $resultado;
}

function pintarProductosCarrito() {
    $valorKey = end(array_keys($_SESSION['carrito'][0]));
    for ($index = 0; $valorKey >= $index; $index++) {
        $imagen = $_SESSION['carrito'][0][$index]['img'];
        $nombre = $_SESSION['carrito'][0][$index]['nombre'];
        $precio = $_SESSION['carrito'][0][$index]['precio'];
        $idProducto = $_SESSION['carrito'][0][$index]['idProduct'];
        if (!empty($nombre)) {
            $resultado .= <<<EX
        <div class="product product-widget">
<div class="product-thumb">
 <img src="$imagen" alt="">
 </div>
<div class="product-body">
<h3 class="product-price">$precio €</h3>
<h2 class="product-name"><a href="#">$nombre</a></h2>
</div>
<a href="BBDD/carrito.php?id=$idProducto&accion=borrar"<button id="$idProducto" class="cancel-btn"><i class="fa fa-trash"></i></button></a>
</div>
EX;
        }
    }
    return $resultado;
}

function sumaPrecioProductos() {
    $valorKey = end(array_keys($_SESSION['carrito'][0]));
    $suma = 0.00;
    for ($index = 0; $valorKey >= $index; $index++) {
//        $suma += (float)$_SESSION['carrito'][0][$index]['precio'];
        $suma = (float) $suma + (float) $_SESSION['carrito'][0][$index]['precio'];
    }
    $total = $suma;
    return $total;
}

function pintarListaCarrito() {
    $valorKey = end(array_keys($_SESSION['carrito'][0]));
    $resultado;
    for ($index = 0; $valorKey >= $index; $index++) {
        $imagen = $_SESSION['carrito'][0][$index]['img'];
        $nombre = $_SESSION['carrito'][0][$index]['nombre'];
        $precio = $_SESSION['carrito'][0][$index]['precio'];
        $tipo = $_SESSION['carrito'][0][$index]['tipo'];
        $idProducto = $_SESSION['carrito'][0][$index]['idProduct'];
        if ($nombre != "") {
            $resultado .= <<<EX
                    <tr>
                    <th scope="col"><img src="$imagen" style="width:10%;"></th>
                    <th scope="col">$nombre</th>
                    <th scope="col">$precio</th>
                    <th scope="col">$tipo</th>
                    <th scope="col"><a href="BBDD/carrito.php?id=$index&accion=borrar"<button class="cancel-btn"><i class="fa fa-trash"></i></button></a></th>
                    </tr>
EX;
        }
    }
    $sumaTotal = sumaPrecioProductos();
    $resultado .= '<tr><th></th><th></th></th><th>Suma total:</th><th>' . $sumaTotal . ' €</th><th><a href="BBDD/carrito.php?&accion=borrarTodo"<button class="cancel-btn"><i class="fa fa-trash"></i></button></a></th></tr>';
    $resultado .= '<tr><th></th><th></th><th></th><th></th><th></th></tr>';
    return $resultado;
}

function ultimoIdFactura() {
    $conexion = conectarBD();
    $sql = $conexion->prepare("select idFactura from facturas where idUsuario = :id order by idFactura DESC limit 1");
    $sql->bindParam(":id", $_SESSION['idUsuario'], PDO::PARAM_INT);
//    $id = 1;
//    $sql->bindParam(":id", $id,PDO::PARAM_INT);
    if ($sql->execute()):
        if ($sql->rowCount()):
            $row = $sql->fetchObject();
            $resultado = $row->idFactura;
        else:
            $resultado = 0;
        endif;
    else:
        $resultado = "Se ha producido un error en la base de datos";
    endif;
    return $resultado;
}

function insertarFactura($id) {
    $conexion = conectarBD();
    $sql = $conexion->prepare("INSERT INTO facturas (idUsuario) values(:id)");
    $sql->bindParam(":id", $id);
    if ($sql->execute()) {
        return true;
    } else {
        return false;
    }
}

function pintarFacturas() {
    $conexion = conectarBD();
    $sql = $conexion->prepare("select idFactura,Fecha from facturas where idUsuario = :id");
    $sql->bindParam(":id", $_SESSION['idUsuario']);
    $sql->execute();
    $tablas;
    $resultado = $sql->fetchAll();
    foreach ($resultado as $value) {
        $idFactura = $value['idFactura'];
        $fecha = $value['Fecha'];
        $tablas .= "<pre><table class='table'><tr>"
                . "<th scope='col'>ID de la factura : $idFactura</th>"
                . "<th scope='col'>Fecha $fecha</th>"
                . "</tr>"
                . "<tr>"
                . "<th scope='col'>Imagen</th>"
                . "<th scope='col'>Nombre</th>"
                . "<th scope='col'>Tipo</th>"
                . "<th scope='col'>Precio</th>";
        $query = $conexion->prepare("select Img,Nombre,tipo,precio from productos
        INNER join facturas_productos on facturas_productos.idProducto=productos.idProducto
        where idFactura = :idFactura");
        $query->bindParam(":idFactura", $idFactura);
        $query->execute();
        $val = $query->fetchAll();
        $sumaTotal = 0;
        foreach ($val as $value) {
            $imagen = $value['Img'];
            $nombre = $value['Nombre'];
            $tipo = $value['tipo'];
            $precio = $value['precio'];
            $tablas .= "<tr><th scope='col'><img src='$imagen' style='width:10%'></th>"
                    . "<th scope='col'>$nombre</th>"
                    . "<th scope='col'>$tipo</th>"
                    . "<th scope='col'>$precio</th>"
                    . "</tr>";
            $sumaTotal = (float) $sumaTotal + (float) $precio;
        }
        $tablas .= "<tr><th></th><th></th><th scope='col'>Suma total = $sumaTotal € </th><th scope='col'></th></tr>";
        $tablas .= "</table></pre>";
    }
    return $tablas;
}

function productosRelacionados($tipo) {
    $conexion = conectarBD();
    $maximo = numProductos($tipo) - 3;
    $num = rand(0, $maximo);

    $sql = $conexion->prepare("SELECT idProducto,nombre,precio,img from productos where tipo = :tipo Limit $num,3");
    $sql->bindParam(":tipo", $tipo);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $value) {
        $idProducto = $value['idProducto'];
        $nombre = $value['nombre'];
        $precio = $value['precio'];
        $imagen = $value['img'];
        $cadena .= <<<EX
                    <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <a href="detalles.php?id=$idProducto"><button class="main-btn quick-view"><i class="fa fa-info"></i> Detalles</button></a>
                                    <img src="$imagen" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$precio €</h3> 
                                    <div class="product-rating">
                                    </div>
                                    <h2 class="product-name"><a href="detalles.php?id=$idProducto">$nombre</a></h2>
                                    <div class="product-btns center">
                                        <a href="detalles.php?id=$idProducto"><button class="main-btn icon-btn"><i class="fa fa-info"></i></button> <Strong>Información</Strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
EX;
    }
    return $cadena;
}

function ultimosProductosVendidos() {
    $conexion = conectarBD();

    $sql = $conexion->prepare("SELECT facturas_productos.idProducto,nombre,precio,img FROM `facturas_productos`
                                inner join productos on productos.idProducto=facturas_productos.idProducto
                                group by idFactura DESC LIMIT 6");
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $value) {
        $idProducto = $value['idProducto'];
        $nombre = $value['nombre'];
        $precio = $value['precio'];
        $imagen = $value['img'];
        $cadena .= <<<EX
                    <div class="product product-single">
                                    <div class="product-thumb">
                                        <a href="detalles.php?id=$idProducto"<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Más información</button></a>
                                        <img src="$imagen" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">$precio €</h3>
                                        <h2 class="product-name"><a href="detalles.php?id=$idProducto">$nombre</a></h2>
                                    </div>
                                </div>
EX;
    }
    return $cadena;
}

function buscarApi($nombre) {
    $apiKey = "252cc403756b3da734c595016b67a914";
//$fodd = "tomatoes";
    $food = $nombre;
    $url = "https://www.food2fork.com/api/search?key=$apiKey&q=$food&page=1";
    $response = file_get_contents($url);
    $resultado = json_decode($response, true);

    for ($index = 0; $index < $resultado['count']; $index++) {
        $titulo = $resultado['recipes'][$index]['title'];
        $id = $resultado['recipes'][$index]['recipe_id'];
        $imagen = $resultado['recipes'][$index]['image_url'];
        $url = $resultado['recipes'][$index]['source_url'];
        $res .= <<<EX
<div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href='$url'"<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button></a>
                                            <img src="$imagen" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h1 class="product-name"><a href="#">$titulo</a></h1>
                                        </div>
                                    </div>
                                </div>
                <div class="clearfix visible-sm visible-xs"></div>
                
EX;
    }
    if($res == ""){
        $res = "No se han encontrado recetas para ese alimento";
    }
    return $res;
}

