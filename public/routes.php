<?php

use Controllers\HomeController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($url) {
    case '/':
        HomeController::index();
        break;

    default:
        require "../view/error.html";
        break;
}
