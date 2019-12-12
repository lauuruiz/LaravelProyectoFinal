<?php

class Comanda
{

    private $id, $idFactura, $idProducto, $idEmpleado, $unidades, $entregada;
    private $precio;

    public function __construct($id, $idFactura, $idProducto, $idEmpleado, $unidades, $precio, $entregada)
    {
        $this->id = $id;
        $this->idFactura = $idFactura;
        $this->idProducto = $idProducto;
        $this->idEmpleado = $idEmpleado;
        $this->unidades = $unidades;
        $this->precio = $precio;
        $this->entregada = $entregada;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdFactura()
    {
        return $this->idFactura;
    }

    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }

    public function getUnidades()
    {
        return $this->unidades;
    }

    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }

    public function getEntregada()
    {
        return $this->entregada;
    }

    public function setEntregada($entregada)
    {
        $this->entregada = $entregada;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

}