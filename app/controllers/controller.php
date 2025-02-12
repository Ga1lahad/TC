<?php

namespace Controllers;

use Classes\Conexao;
use Daos\UsuarioDao;
use Exception;

class Controller
{
    static function nav()
    {
        $conn = new Conexao;
        $userDao = new UsuarioDao($conn->conectar());
        require __DIR__ . '/../view/components/nav.php';
    }
    static function footer()
    {
        require __DIR__ . '/../view/components/footer.php';
    }
    static function mail()
    {
        require __DIR__ . '/../view/components/mailer.php';
    }
    static function mapa()
    {
        if (isset($_GET["endereco"])) {
            $endereço = $_GET["endereco"];
            require __DIR__ . '/../view/components/geradorDeMapa.php';
        } else {
            header("Location:/");
        }
    }
    static function auth()
    {
        try {
            if (isset($_GET["user"])) {
                $conn = new Conexao;
                $userDao = new UsuarioDao($conn->conectar());
                $USUARIO = $_GET["user"];
                $SENHA = $_GET["pass"];
                $auth = $userDao->Autorizar($USUARIO, $SENHA);
                if ($auth != null) {
                    $_SESSION["id"] = $auth["id"];
                    $_SESSION["nome"] = $auth["nome"];
                }
            }
        } catch (Exception $err) {
            header("Location: /erro?cod=" . $err->getCode() . "&msg=" . $err->getMessage());
        }
    }
}
