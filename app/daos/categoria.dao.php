<?php

namespace Daos;


use Classes\Categoria;
use Daos\Dao;
use PDO;

class CategoriaDao extends Dao
{
    private $pdo;

    function __construct(PDO $conn)
    {
        $this->pdo = $conn;
    }

    function Inserir(object $Obj) {}

    function Remover(object $Obj) {}

    function ListarTodos(): array
    {
        $query =  $this->pdo->prepare("SELECT * FROM tags");
        $query->execute();
        $results = $query->fetchAll();
        $tags = array();

        foreach ($results as $row) {
            if ($row['status'] == 1) {
                $tag = new Categoria();
                $tag->id = $row['id'];
                $tag->nome = $row['nome'];
                $categorias[] = $tag;
            }
        }

        return $categorias;
    }

    function Listar($busca) {}

    function Atualizar(object $Obj) {}
}
