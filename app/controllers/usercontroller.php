<?php

namespace Controllers;


class UserController
{
    // private function autenticar(): Usuario {
    //     $u = new Usuario;
    //     return
    // }
    static function index()
    {

        echo '<link rel="stylesheet" href="css/login.css">';
        require __DIR__ . '/../view/login.html';
        echo '<script src="js/login.js">';
    }
}
