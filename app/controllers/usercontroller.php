<?php

namespace Controllers;

use Controllers\Controller;

class UserController
{
    // private function autenticar(): Usuario {
    //     $u = new Usuario;
    //     return
    // }

    static function user()
    {
        if (true) {
            echo '<link rel="stylesheet" href="css/setting.css">';
            require __DIR__ . '/../view/user.php';
            echo '<script src="js/setting.js"></script>';
        } else {
            header("location:/log");
        }
    }
    static function login()
    {
        echo '<link rel="stylesheet" href="css/login.css">';
        require __DIR__ . '/../view/login.php';
        echo '<script src="js/login.js"></script>';
    }
    static function cadastro()
    {
        echo '<link rel="stylesheet" href="css/login.css">';
        require __DIR__ . '/../view/cadastro.php';
        echo '<script src="js/cadastro.js"></script>';
    }
    static function ValidarCNPJ()
    {
        if (isset($_GET["cnpj"]) || strlen($_GET["cnpj"]) == 14) {
            $CNPJ = $_GET["cnpj"];
            require __DIR__ . '/../view/components/receitaWSApi.php';
        } else {
            header("location:cnpj_invalido");
        }
    }
    static function mail()
    {
        require __DIR__ . '/../view/components/mailer.php';
    }
}
