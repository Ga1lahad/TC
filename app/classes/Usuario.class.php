<?php

namespace Classes;

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $endereço;
    private $email;

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
