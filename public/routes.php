<?php

use Controllers\Controller;
use Controllers\HomeController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($url) {
    case '/':
        Controller::nav();
        HomeController::index();
        break;

    default:
        require "../app/view/error.html";
        break;
}
