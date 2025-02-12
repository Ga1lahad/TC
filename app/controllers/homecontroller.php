<?php

namespace Controllers;

use Classes\Categoria;
use Classes\Conexao;
use Daos\CategoriaDao;
use Daos\EmpresasDao;
use Daos\ServicoDao;

class HomeController
{
    static function index()
    {
        $conn = new Conexao;
        // $categoriaDao = new CategoriaDao($conn->conectar());
        // $categorias = $categoriaDao->ListarTodos();
        $empresaDao = new EmpresasDao($conn->conectar());
        $lista = $empresaDao->ListarTodos();
        echo '<link rel="stylesheet" href="css/home.css">';
        require __DIR__ . '/../view/home.php';
        echo '<script src="js/home.js"></script>';
    }
}
