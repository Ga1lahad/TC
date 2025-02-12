<?php

namespace Classes;

class Chamado
{
    private $id;
    private $data_de_criacao;
    private $data_de_atendimento;
    private $motivo;
    private $valor;
    private $estado;
    private Usuario $usuario;
    private Tecnico $tecnico;

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
