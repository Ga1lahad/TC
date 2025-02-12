<?php

namespace Classes;

use PDO;
use PDOException;

class Conexao
{
    private $driver;
    private $username;
    private $pass;
    private $dbName;
    private $host;
    private static $pdo;

    /**Metodo magico construtor para a conexão, Alterado manualmente atraves do switch */
    function __construct()
    {
        switch ("teste") {
            case 'teste':
                $this->driver = 'mysql';
                $this->username = 'root';
                $this->pass = '';
                $this->dbName = 'tc';
                $this->host = 'localhost';
                break;

            default:
                echo ("Banco invalido/ainda a ser implementado");
                break;
        }
    }

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

    /**Função que cria ou retorna o PDO object baseado na existencia do mesmo, Objeto statico*/
    function conectar()
    {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO("$this->driver:host=$this->host;dbname=$this->dbName", $this->username, $this->pass);
            }
            return self::$pdo;
        } catch (PDOException $e) {
            echo 'Erro De conexão no Banco de dados: ' . $e->getMessage();
        }
    }
}
