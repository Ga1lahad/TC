<?php
require "routes.php";
spl_autoload_register(function ($classname) {
    if (file_exists("../classes/$classname.class.php")) {
        require "../classes/$classname.class.php";
    } elseif (file_exists("../classes/$classname.dao.php")) {
        require "../classes/$classname.dao.php";
    } elseif (file_exists("../classes/$classname.controller.php")) {
        require "../classes/$classname.controller.php";
    }
});
