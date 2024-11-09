<?php

namespace Classes;

class Empresa
{
    private $id;
    private $nome;
    private $cnpj;
    private $endereco;
    private $telefone;

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
