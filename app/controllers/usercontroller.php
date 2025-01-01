<?php

namespace Controllers;


class UserController
{
    // private function autenticar(): Usuario {
    //     $u = new Usuario;
    //     return
    // }

    static function user()
    {
        echo '<link rel="stylesheet" href="css/login.css">';
        require __DIR__ . '/../view/user.php';
        echo '<script src="js/login.js"></script>';
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
}
