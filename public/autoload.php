<?php
spl_autoload_register(function ($classname) {
    $classname = strtolower($classname);
    if (file_exists("../app/$classname.class.php")) {
        require "../app/$classname.class.php";
    }
    if (file_exists("../app/$classname.dao.php")) {
        require "../app/$classname.dao.php";
    }
    if (file_exists('../app/' . $classname . '.php')) {
        require '../app/' . $classname . '.php';
    }
});
require "routes.php";
