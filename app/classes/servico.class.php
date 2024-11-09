<?php

namespace Classes;

class Servico
{
    private $nome;
    private $valor;
    private $descricao;

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
