<?php

namespace Classes;

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $senha;
    private $telefone;
    private $cep;
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
    function preencher(array $dados_do_listar): Usuario
    {
        if (isset($dados_do_listar["id"])) {
            $this->id = $dados_do_listar["id"];
        }
        $dados_do_listar["cpf"] = hash("sha256", preg_replace('/\D/', '', $dados_do_listar["cpf"]));
        $dados_do_listar["senha"] = hash("sha256", $dados_do_listar["senha"]);

        $this->nome = $dados_do_listar["nome"];
        $this->telefone = preg_replace('/\D/', '', $dados_do_listar["tele"]);
        $this->email = $dados_do_listar["email"];
        $this->cep = $dados_do_listar["cep"];
        $this->senha = $dados_do_listar["senha"];
        $this->cpf = $dados_do_listar["cpf"];
        $this->endereco = $dados_do_listar["rua"] . ',' . $dados_do_listar["numero"] . ',' . $dados_do_listar['cidade'] . '/' . $dados_do_listar['uf'];
        return $this;
    }
}
