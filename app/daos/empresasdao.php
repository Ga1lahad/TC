<?php

namespace Daos;

use Classes\Empresa;
use Exception;
use PDO;
use PDOException;

class EmpresasDao extends Dao
{
    private $pdo;
    function __construct(PDO $conn)
    {
        $this->pdo = $conn;
    }
    /**Insere no banco o Empresa e retorna o id gerado pelo banco */
    function Inserir(object $Obj)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tc.empresa
(Estado, `Nome Fantasia`, CNPJ, descricao, sobre, Endereco, Telefone, email, atividade_principal, atividade_secundario)
VALUES(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $Obj->estado);
            $stmt->bindParam(2, $Obj->nome);
            $stmt->bindParam(3, $Obj->cnpj);
            $stmt->bindParam(4, $Obj->descricao);
            $stmt->bindParam(5, $Obj->descricao);
            $stmt->bindParam(6, $Obj->endereco);
            $stmt->bindParam(7, $Obj->telefone);
            $stmt->bindParam(9, $Obj->email);
            $stmt->bindParam(9, $Obj->atividade_principal);
            $stmt->bindParam(10, $Obj->atividade_secundaria);
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
        $empresas = array();
        $stmt = $this->pdo->prepare('SELECT * FROM empresas;');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $empresa) {
            $e = new Empresa;
            $e->preenchimento($empresa);
            $empresas[] = $e;
        }
        return $empresas;
    }
    function Listar($id): Empresa
    {
        $stmt = $this->pdo->prepare("SELECT * FROM empresas WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $dados = $stmt->fetch();
        $empresa = new Empresa;
        $empresa->preenchimento($dados);
        return $empresa;
    }
    function Atualizar(object $Obj) {}
    function VerificaEmpresa($id)
    {
        $stmt = $this->pdo->prepare("SELECT e.* FROM empresas e JOIN usuarios u ON e.id = u.administracao WHERE u.id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $dados = $stmt->fetch();
        $empresa = new Empresa;
        if (!$dados) {
            return $dados;
        } else {
            $empresa->preenchimento($dados);
            return $empresa;
        }
    }
}
