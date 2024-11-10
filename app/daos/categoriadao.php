<?php

namespace Daos;


use Classes\Categoria;
use Daos\Dao;
use PDO;
use PDOException;

class CategoriaDao extends Dao
{
    private $pdo;

    function __construct(PDO $conn)
    {
        $this->pdo = $conn;
    }

    function Inserir(object $Obj)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO categoria (nome,status) VALUES (?,?);");
            $stmt->bindParam(1, $Obj->nome);
            $stmt->bindParam(2, $Obj->status);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "<script>alert('Erro na inserção do banco de dados')</script>";
        }
    }

    function Remover(object $Obj) {}

    function ListarTodos(): array
    {
        $stmt =  $this->pdo->prepare("SELECT * FROM categorias");
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            if ($row['status'] == 1) {
                $categoria = new Categoria();
                $categoria->id = $row['id'];
                $categoria->nome = $row['nome'];
                $categoria->nome = $row['status'];
                $categorias[] = $categoria;
            }
        }
        return $categorias;
    }

    function Listar($busca) {}

    function Atualizar(object $Obj) {}
}
