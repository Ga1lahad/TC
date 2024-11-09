<?php

namespace Classes;

class Tecnico
{
    private $id;
    private Usuario $usuario;
    private $status;
    private $empresa;

    /**Metodo magico set*/
    function __set($name, $value)
    {
        $this->$name = $value;
    }
    /**Metodo magico gets*/
    function __get($name)
    {
        return $this->$name;
    }
}
