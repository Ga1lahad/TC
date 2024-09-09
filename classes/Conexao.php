<?php
class Conexao
{
    private $driver;
    private $username;
    private $pass;
    private $dbName;
    private $host;
    private static $pdo;

    public function __construct(String $banco)
    {
        switch ($banco) {
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
