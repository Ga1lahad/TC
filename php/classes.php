<?php
class Categorias
{
    private $id;
    private $nome;
    private $status;

    function __construct(int $ID, string $NOME, bool $STATUS)
    {
        $this->id = $ID;
        $this->nome = $NOME;
        $this->status = $STATUS;
    }

    function __get($name)
    {
        return ($this->$name);
    }       # code...
}
