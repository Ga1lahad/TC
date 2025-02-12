<?php

namespace Classes;

class Empresa
{
    private $id;
    private $estado;
    private $nome;
    private $cnpj;
    private $descricao;
    private $sobre;
    private $cep;
    private array $endereco;
    private $telefone;
    private $email;
    private $atividade_principal;
    private $atividade_secundaria;
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
    function preenchimento(array $dados)
    {
        $this->id = $dados["id"];
        $this->estado = $dados["estado"];
        $this->nome = $dados["nome_fantasia"];
        $this->cnpj = $dados["cnpj"];
        $this->descricao = $dados["descricao"];
        $this->sobre = $dados["sobre"];
        $this->cep = $dados["cep"];
        $this->telefone = $dados["telefone"];
        $this->email = $dados["email"];
        $this->atividade_principal = $dados["atividade_principal"];
        $this->atividade_secundaria = $dados["atividade_secundaria"];
        $this->pontos = $dados["pontos"];
        //Tratamento de endereço
        $endereco = explode(",", $dados["endereco"]);
        $this->endereco['rua'] = $endereco[0];
        $this->endereco['numero'] = $endereco[1];
        $this->endereco['cidade'] = $endereco[2];
        $this->endereco['uf'] = $endereco[3];
    }
}
