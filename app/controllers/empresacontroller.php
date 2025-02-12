<?php

namespace Controllers;

use Classes\Categoria;
use Classes\Conexao;
use Daos\CategoriaDao;
use Daos\EmpresasDao;
use Daos\ServicoDao;

class EmpresaController
{

    static function empresa()
    {
        $ID = $_GET['id'];
        $conn = new Conexao;
        $empresaDao = new EmpresasDao($conn->conectar());
        $servicoDao = new ServicoDao($conn->conectar());
        $empresa = $empresaDao->Listar($ID);
        $listaServico = $servicoDao->ListarTodos();
        echo '<link rel="stylesheet" href="css/empresa.css">';
        require __DIR__ . '/../view/empresa.php';
        echo '<script src="js/mapa.js"></script>';
    }
    static function atualizaEmpresa()
    {
        $conn = new Conexao;
        $empresaDao = new EmpresasDao($conn->conectar());
        if (isset($_POST['nome'])) {
            $_POST['fileicon'];
            $_POST['filebanner'];
            $target_dir = __DIR__ . "uploads/";
            var_dump($_POST);
            die;
        }

        $empresa = $empresaDao->VerificaEmpresa($_SESSION["id"]);
        echo '<link rel="stylesheet" href="css/empresa.css">';
        require __DIR__ . '/../view/atualizaempresa.php';
        echo '<script src="js/atualizaempresa.js"></script>';
    }
    static function cadEmpresa()
    {
        $conn = new Conexao;
        $empresaDao = new EmpresasDao($conn->conectar());

        echo '<link rel="stylesheet" href="css/empresa.css">';
        require __DIR__ . '/../view/cadastroempresa.php';
        echo '<script src="js/cadEmpresa.js"></script>';
    }
    static function VerificaEmpresa($id)
    {
        $conn = new Conexao;
        $empresaDao = new EmpresasDao($conn->conectar());
        $empresa = $empresaDao->VerificaEmpresa($id);
        if (isset($empresa->id)) {
            return $empresa;
        }
    }
}
