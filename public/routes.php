<?php
session_start();

use Controllers\Controller;
use Controllers\EmpresaController;
use Controllers\HomeController;
use Controllers\UserController;

function valida()
{
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        header("Location: /log");
    }
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($url) {
    case '/':
        Controller::nav();
        HomeController::index();
        Controller::footer();
        break;
    case '/u':
        valida();
        Controller::nav();
        UserController::user();
        Controller::footer();
        break;
    case '/cnpj':
        UserController::ValidarCNPJ();
        break;
        // case '/mail':
        //     Controller::mail();
        //     break;
    case '/mapa':
        Controller::mapa();
        break;
    case '/log':
        if (isset($_SESSION['id'])) {
            header("Location: /u");
            exit;
        } else {
            Controller::nav();
            UserController::login();
            Controller::footer();
        }
        break;
    case '/auth':
        Controller::auth();
        break;
    case '/empresa':
        Controller::nav();
        EmpresaController::empresa();
        Controller::footer();
        break;
    case '/atualizaEmpresa':
        Controller::nav();
        EmpresaController::atualizaEmpresa();
        Controller::footer();
        break;
    case '/cadempresa':
        Controller::nav();
        EmpresaController::cadEmpresa();
        Controller::footer();
        break;
    case '/cad':
        Controller::nav();
        UserController::cadastro();
        Controller::footer();
        break;
    case '/logout':
        session_destroy();
        header("Location: /");
        break;

    default:
        echo '<link rel="stylesheet" href="css/index.css">';
        require "../app/view/error.php";
        break;
}
