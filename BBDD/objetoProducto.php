<?php

class objtProducto {
    public $idProduct;
    public $nombre;
    public $precio;
    public $tipo;
    public $img;
    

    public function __construct($idProduct,$nombre, $precio, $tipo, $img) {
        $this->idProduct = $idProduct;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->img = $img;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getTipo() {
        return $this->tipo;
    }
    function getIdProduct() {
        return $this->idProduct;
    }

    function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

        function getUrlImg() {
        return $this->img;
    }

    function setUrlImg($img) {
        $this->img = $img;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function __toString() {
        return "Datos del producto = $this->idProduct, $this->nombre , $this->precio , $this->tipo, $this->img";
    }

}
