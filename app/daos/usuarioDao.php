<?php

namespace Daos;

use Classes\Mailer;
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
        $cpf = $Obj->cpf;
        $nome = $Obj->nome;
        $telefone = $Obj->telefone;
        $cep = $Obj->cep;
        $endereco = $Obj->endereco;
        $email = $Obj->email;
        $senha = $Obj->senha;
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cpf = ?");
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
            $cpfExiste = $stmt->fetchColumn();

            if ($cpfExiste > 0) {
                throw new Exception("Cpf Ja cadastrado", 1);
            }
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, cpf, telefone, cep,endereco, email, senha) VALUES(?,?,?,?,?,?,?);");

            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $cpf);
            $stmt->bindParam(3, $telefone);
            $stmt->bindParam(4, $cep);
            $stmt->bindParam(5, $endereco);
            $stmt->bindParam(6, $email);
            $stmt->bindParam(7, $senha);
            $stmt->execute();
            try {
                Mailer::Email(trim($email), "Confirmação de Cadastro", ["token" => $cpf], "Confirmacao");
            } catch (Exception $e) {
                throw new Exception("Erro ao Enviar Email de verificação: $e", 1);
            }
        } catch (PDOException | Exception $e) {
            echo "<script>
            alert('" . $e->getMessage() . "')
            window.location.href = 'log'
            </script>";
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
        $stmt = $this->pdo->prepare("SELECT id FROM usuarios");
        foreach ($stmt->fetchAll() as $usuario) {
            $u = new Usuario;
            $u->id = $usuario;
            $usuarios[] = $u;
        }
        return $usuarios;
    }
    function Listar($id): Usuario
    {
        $stmt = $this->pdo->prepare("SELECT id,nome,email,telfone,endereco FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id);
        $dados = $stmt->fetch();
        $u = new Usuario;
        $u->listar($dados);
        return $u;
    }
    function Atualizar(object $Obj) {}
    function Autorizar($user, $pass)
    {
        $stmt = $this->pdo->prepare("SELECT id,nome FROM usuarios  WHERE cpf = ? AND senha = ?");
        $stmt->bindValue(1, $user);
        $stmt->bindValue(2, $pass);
        $stmt->execute();
        $dados = $stmt->fetch();
        if (!$dados) {
            throw new Exception('Usuario Invalido', 403);
        }
        return $dados;
    }
}
