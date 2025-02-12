<?php

namespace Daos;

use Classes\Servico;
use Exception;
use PDO;
use PDOException;

class ServicoDao extends Dao
{
    private $pdo;
    function __construct(PDO $conn)
    {
        $this->pdo = $conn;
    }
    /**Insere no banco o Serviço e retorna o id gerado pelo banco */
    function Inserir(object $Obj)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tc.servicos
(nome,valor,descricao,fk_empresa)
VALUES(?,?,?,?)");
            $stmt->bindParam(1, $Obj->nome);
            $stmt->bindParam(2, $Obj->valor);
            $stmt->bindParam(3, $Obj->descricao);
            $stmt->bindParam(4, $Obj->fk_empresa);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "<script>alert('Erro na inserção do banco de dados')</script>";
        }
    }
    /**Metodo de remoção para usuario não implementado */
    function Remover(object $Obj)
    {
        throw new Exception("Metodo não imprelemntado", 1);
    }
    /**Lista todos os usuarios cadastrados, apenas retorna o id */
    function ListarTodos(): array
    {
        $servicos = array();
        $stmt = $this->pdo->prepare('SELECT * FROM servicos;');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $servico) {
            $s = new Servico;
            $s->preenchimento($servico);
            $servicos[] = $s;
        }
        return $servicos;
    }
    function Listar($id): Servico
    {
        $stmt = $this->pdo->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $dados = $stmt->fetchAll();
        $servico = new Servico;
        $servico->preenchimento($dados);
        return $servico;
    }
    function Atualizar(object $Obj)
    {
        throw new Exception("Metodo não imprelemntado", 1);
    }
}
