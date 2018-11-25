<?php
//session_start();
//include('BBDD/function.php');
//include('BBDD/objetoProducto.php');
?>

<header>
    <!-- top Header -->
    <?php 
    if (isset($_SESSION['usuario'])) {
    
    
    ?>
    <div id="top-header">
        <div class="container">
            <div class="pull-left ">
                
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<span>Bienvenido " . $_SESSION['usuario']."</span>";
                    }
                    ?>                                       
                
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header">
                    <!--                            <a class="logo" href="#">-->
                    <a href="index.php"><img class="img-responsive" src="./img/logo.png" alt=""></a>
                    <!--</a>-->
                </div>
                <!-- /Logo -->

                <!-- Search -->

                <!-- /Search -->
            </div>
            <div class="pull-right col-md-5 col-sm-6 col-xs-6">
                <ul class="header-btns">
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="header-btns-icon">
                            
                            <i class="fa fa-user"></i>
                        </div>
                        <!-- Mobile nav toggle-->
                    
                    <!-- / Mobile nav toggle -->
                        <?php
                        if (!isset($_SESSION['usuario'])) {
                            echo '<li><a href="inicioSesion.php" class="text-uppercase">Iniciar sesión</a></li>'
                            . '<li><a href="registro.php" class="text-uppercase">Registro</a></li>';
                        } else {
                            ?>

                        <li class="dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><strong class="text-uppercase">Cuenta</strong>
                                <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="perfilUsuario.php">Mi cuenta</a></li>
                                <li><a href="BBDD/logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <!--//Cuenta de la cantidad de productos que hay-->
                                <span class="qty">
                                    <?php
                                    echo count($_SESSION['carrito'][0]);
                                    ?>
                                </span> 
                                <!--//Cuenta de la cantidad de productos que hay-->
                            </div>
                            <strong class="text-uppercase">Carrito </strong><i class="fa fa-caret-down"></i>
                            <br>
                            <span><?php
                                $precioSumado = sumaPrecioProductos();
                                if($precioSumado == 0){
                                    echo "0 €";
                                }else{
                                    echo $precioSumado."€";
                                }
                                ?>
                            </span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    <!----------------------------Productos comprados------------------------->
                                    <!-------------------------Producto 1-------------------------------->
                                    <?php
                                    if(isset($_SESSION['carrito'])){
                                    $carrito = pintarProductosCarrito();
                                    echo $carrito;
                                    }
                                    ?>        
                                    <!-------------------------FIN Producto 2-------------------------------->
                                </div>
                                <!---------------------------- Fin Productos comprados------------------------->
                                <div class="shopping-cart-btns">
                                    <a href="verCarrito.php"<button class="main-btn">Ver carrito</button></a>
                                    <a href="BBDD/carrito.php?accion=test"<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<?php 
require_once 'nav.php';
echo "<p></p>";
?>
