<?php

namespace Controllers;

class Controller
{
    static function nav()
    {
        require __DIR__ . '/../view/components/nav.php';
    }
    static function footer()
    {
        require __DIR__ . '/../view/components/footer.php';
    }
}
