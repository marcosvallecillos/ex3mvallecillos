<?php

class lamp extends Conexion{

    private $id;
    private $nombre;
    private $encedida;
    protected $modelo;
    private $potencia;
    protected $zona;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getEncedida()
    {
        return $this->encedida;
    }


    public function setEncedida($encedida)
    {
        $this->encedida = $encedida;

        return $this;
    }


    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }


    public function getPotencia()
    {
        return $this->potencia;
    }

    public function setPotencia($potencia)
    {
        $this->potencia = $potencia;

        return $this;
    }


    public function getZona()
    {
        return $this->zona;
    }
 
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }
}
