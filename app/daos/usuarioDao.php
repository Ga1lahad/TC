<?php

namespace Daos;

use Classes\Usuario;
use Exception;
use PDO;
use PDOException;

class UsuarioDao extends Dao
{
    function __construct(PDO $conn)
    {
        $this->pdo = $conn;
    }

    private PDO $pdo;
    /**Insere no banco o Usuario e retorna o id gerado pelo banco */
    function Inserir(object $Obj)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, cpf, telefone, endereço, email,senha) VALUES(?,?,?,?,?,?);");
            $stmt->bindParam(1, $Obj->nome);
            $stmt->bindParam(2, $Obj->cpf);
            $stmt->bindParam(3, $Obj->telefone);
            $stmt->bindParam(4, $Obj->endereco);
            $stmt->bindParam(5, $Obj->email);
            $stmt->bindParam(6, $Obj->senha);
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
        $usuarios = array();
        $stmt = $this->pdo->prepare("SELECT id FROM usuario");
        foreach ($stmt->fetchAll() as $usuario) {
            $u = new Usuario;
            $u->id = $usuario;
            $usuarios[] = $u;
        }
        return $usuarios;
    }
    function Listar($id): Usuario
    {
        $stmt = $this->pdo->prepare("SELECT id,nome,email,telfone,endereco FROM usuario WHERE id = ?");
        $stmt->bindParam(1, $id);
        $dados = $stmt->fetch();
        $u = new Usuario;
        $u->listar($dados);
        return $u;
    }
    function Atualizar(object $Obj) {}
}
