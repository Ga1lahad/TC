<?php

namespace Classes;

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $endereco;
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
    /**Metodo construtor proprio parar listagem do usuario */
    function listar(array $dados_do_listar): Usuario
    {
        $this->id = $dados_do_listar["id"];
        $this->nome = $dados_do_listar["nome"];
        $this->telefone = $dados_do_listar["telefone"];
        $this->email = $dados_do_listar["email"];
        $this->endereco = $dados_do_listar["endereco"];
        return $this;
    }
}
