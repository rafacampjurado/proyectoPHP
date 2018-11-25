<?php
session_start();
include('BBDD/funciones.php');
require_once ('BBDD/objetoProducto.php');
$idUsuario = $_SESSION['idUsuario'];
$idProd = 1;

$opiniones = mostrarOpiniones($idProd);
$existe = exiteComentario($idUsuario, $idProd);
const prueba = 0;
echo prueba;
echo "nombre:".$_SESSION['usuario'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>E-SHOP HTML Template</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="css/slick.css" />
        <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    </head>
    <form id="formOpinion"class="review-form" method="POST">
        <div class="form-group">
            <textarea name="opinion" class="input" placeholder="Opinión"></textarea>
        </div>
        <div class="form-group">
            <div class="input-rating">
                <strong class="text-uppercase">Tu puntuación: </strong>
                <div class="stars">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                </div>
            </div>
        </div>
        <input type="number" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>" hidden="hidden" name="idUsuario">
        <button type="submit" class="primary-btn" name="btnComentario" id="btnComentario">Enviar</button>
        <input type="number" id="idProducto" value="<?php echo $idProd; ?>" hidden="hidden" name="idProducto">
    </form>
    <p>----------------------------------</p>
    <?php

    $producto = new objtProducto(1, 'manzana', 1.3, 'fruta', '/img');
    $productoDos = new objtProducto(3, 'aguacate', 20.00, 'fruta', '/img');
    $productoTres = new objtProducto(4, 'sandia', 5.00, 'fruta', '/img');
    $primerProducto = var_dump($producto);
    $segundoProducto = var_dump($productoDos);

    echo "----------------------------------- <br>";
    $serializar = serialize($producto);
    $seriProductoDos = serialize($productoDos);
//    print_r($serializar);
//    echo "<br>" . $serializar;
    echo "<br>";
    ?>
        <?php
    $testArrayUno = (array) $producto;
    $testArrayDos = (array) $productoDos;
    $testArrayTres = (array) $productoTres;
//    print_r($testArrayUno);
    echo "<br>";
//    print_r($testArrayDos);
    echo "<br>";
//------------------------------------------------------------------------------
    $pruebaArray [0] [0] = $testArrayUno;
    $pruebaArray [0] [1] = $testArrayDos;
//    $pruebaArray [0] [2] = $testArrayTres;
//    $pruebaArray [0] [3] = "";
     unset($pruebaArray[0][2]); // te borra la fila del array
    $longitudArray = count($pruebaArray[0]);
    echo "longitud = ".$longitudArray;
    //terminas de crear el array y lo serializamos.

    var_dump($pruebaArray);
    echo "<br>";
//    echo "id =" . $pruebaArray[1][0]['idProduct'] . "<br>";

    for ($index = 0; $index < count($pruebaArray[0]); $index++) {
        echo "id = ".$pruebaArray[0][$index]['idProduct']." Nombre = ".$pruebaArray[0][$index]['nombre']."<br>";
    }
    
    echo "La longitud del array es = ".$longitudArray."<br>";
//    $_SESSION['carrito'] = $pruebaArray;
    echo "------------------------------------------------------------<br>";
    echo "CARRITO : <br>";
    var_dump($_SESSION['carrito']);
    $longitudCarrito = count($_SESSION['carrito'][0]);
    echo "<br> Longitud del carrito = ".$longitudCarrito;
    echo "<p>--------------------------------------------------</p>";
    ?>
    <form action="BBDD/testObjeto.php" method="POST">
        <textarea name="objeto" ><?php echo $serializar; ?></textarea>
        <input type="submit">

    </form>
    <?php // echo "Carrito = ".var_dump($_SESSION['carrito']); ?>
    <p>----------------------------------</p>
    <?php
    $num = numComentarios($idProd);
    echo "numero de comentarios: " . $num;
    ?>
    <div id="comentarios">
        <?php
        echo $opiniones . "<br>";
        echo "Existe comentario : " . $existe;
        ?>
    </div>
    <div id="pagina" data-pagina="1"></div>
    <?php
//    $numFilas = numComentarios($idProd);
//    $numPaginas;
//    while($numFilas > 0){
//        $numFilas -= 3;
//        $numPaginas++;
//    }
    echo "numero de paginas = " . $numPaginas . "<br>";
    $paginas = pintarPaginas($idProd);
    echo $paginas;
    ?>
    <!--<a value="1"></a>-->
    <script>

//        $("#btnComentario").click(function () {
//        function obtenerComent() {
//            console.log("pulsado");
//            var id = $('#idProducto').val();
//            console.log(id);
//            var data = {};
//            data.id = id;
//
//            $.ajax({
//                url: 'buscComentarios.php',
//                type: 'post',
//                data: data,
//                success: function (response) {
//                    var array = response;
//                    if (array == "") {
//                        console.log("no hay json");
//                    } else {
//                        console.log("si hay json");
//                    }
//
//                    $("#comentarios").html(response.data);
//                    $("#pagina").data(+1);
//
//                }
//            });
//        });
        $(".reviews-pages").on('click', 'button', function () {
            console.log("pulsado");
//            var pag = $(".numpag").data("pagina") ;
            var pag = ($(this).attr('id'));
            var id = $('#idProducto').val();
            console.log("pagina " + pag);
            console.log("id " + id);
            var data = {};
            data.pag = pag;
            data.id = id;

            $.ajax({
                url: 'buscComentarios.php',
                type: 'post',
                data: data,
                success: function (response) {
                    var array = response;
                    if (array == "") {
                        console.log("no hay json");
                    } else {
                        console.log("si hay json");
                    }
                    console.log(response);
                    $("#comentarios").html(response.data);


                }
            });
        });


//        $("#formOpinion").submit(function (e) {
//            var form = $(this);
//            var formData = {
//                'opinion': $('textarea[name=opinion]').val(),
//                'ratin': $('input[name=rating]').val(),
//                'idUsuario': $('input[name=idUsuario]').val(),
//                'idProducto': $('input[name=idProducto]').val()
//            };
////            var idUsuario = $('idUsuario').val();
//            console.log(formData);
//            $.ajax({
//                type: "POST",
//                url: 'enviarOpinion.php',
//                data: form.serialize()
//            });
//            e.preventDefault();
//        });
    </script>
</html>