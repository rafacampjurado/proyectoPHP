<footer id="footer" class="footer section section-grey clearfix">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <p>Página web creada para la asginatura de Desarrollo Web en Entorno Servidor</p>

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Cuenta</h3>
                    <ul class="list-links">
                        <li><a href="#">Mi cuenta</a></li>
                        
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Información</h3>
                    <ul class="list-links">
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Guia de compra  </a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                        ?>
                        <h3 class="footer-header">¿Ya tienes cuenta?</h3>  
                        <form action="BBDD/iniciarUsuario.php" method="post">  
                            <div class="form-group text-center">
                                <div class="form-group text-left">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Antonio359" required>
                                </div>
                                <div class="form-group text-left">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" name="contraseña"class="form-control" id="contraseña" placeholder="contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>
                    <?php } else {
                        ?>
                        <h3 class="footer-header"><?php echo "Bienvenido " . $_SESSION['usuario']; ?> </h3>
                        <ul class="list-links">
                            <li><a href="BBDD/logout.php">Cerrar Sesión </a> </li>
                        </ul>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>