<?php

use Controllers\Controller;
use Controllers\HomeController;
use Controllers\UserController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($url) {
    case '/':
        Controller::nav();
        HomeController::index();
        Controller::footer();
        break;
    case '/u':
        Controller::nav();
        UserController::user();
        Controller::footer();
        break;
    case '/cnpj':
        UserController::ValidarCNPJ();
        break;
    case '/mail':
        UserController::mail();
        break;
    case '/log':
        Controller::nav();
        UserController::login();
        Controller::footer();
        break;
    case '/cad':
        Controller::nav();
        UserController::cadastro();
        Controller::footer();
        break;

    default:
        require "../app/view/error.html";
        break;
}
