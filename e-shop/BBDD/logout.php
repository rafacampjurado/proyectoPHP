<?php
include ('funciones.php');
session_start();
if (isset($_SESSION['usuario'])) {
    logout();
    header("location: ../index.php");
}

