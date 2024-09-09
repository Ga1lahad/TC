<?php
// Classe dos objetos que compoem os filtros
class Tag
{
    private $id;
    private $nome;

    // Gettters e Setters
    function __set($name, $value)
    {
        $this->$name = $value;
    }
    function __get($name)
    {
        return $this->$name;
    }

    // Puxa do banco todas as Tags e cria o objeto para todas as Tags com status 1
    function readAll(PDO $pdo)
    {
        $query =  $pdo->prepare("SELECT * FROM tags");
        $query->execute();
        $results = $query->fetchAll();
        $tags = array();
        foreach ($results as $row) {
            if ($row['status'] == 1) {
                $tag = new Tag();
                $tag->id = $row['id'];
                $tag->nome = $row['nome'];
                $tags[] = $tag;
            }
        }
        return $tags;
    }
}
