<?php

namespace Classes;

class Servico
{
    private $nome;
    private $valor;
    private $descricao;
    private $idEmpresa;
    private $pontos;

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
    function preenchimento(array $Dados)
    {
        $this->nome = $Dados["nome"];
        $this->valor = $Dados["valor"];
        $this->descricao = $Dados["descricao"];
        $this->idEmpresa = $Dados["fk_empresa"];
        $this->pontos = number_format($Dados["pontos"], 1);
    }
}
