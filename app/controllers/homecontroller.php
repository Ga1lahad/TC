<?php

namespace Controllers;

use Classes\Categoria;
use Classes\Conexao;
use Daos\CategoriaDao;

class HomeController
{
    static function index()
    {
        $conn = new Conexao;
        $categoriaDao = new CategoriaDao($conn->conectar());
        $categorias = $categoriaDao->ListarTodos();
        echo '<link rel="stylesheet" href="css/home.css">';
        require '../app/view/home.php';
    }
}
