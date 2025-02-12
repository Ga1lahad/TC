<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
</head>

<body id="body">
    <nav id="header">
        <div class="logo">
            <a href="/">
                <img src="imgs/logo.png" alt="Logo">
            </a>
        </div>
        <div class="search">
            <form action="">
                <input type="search" placeholder="Pesquisa por serviço ou empresa">
            </form>
        </div>
        <div class="user">
            <a href="/log">
                <h1 style="text-decoration: underline;">
                    <?php
                    if (isset($_SESSION["nome"])) {
                        $nome = explode(" ", $_SESSION["nome"]);
                        echo $nome[0];
                    } else {
                        echo "Login";
                    }
                    ?>
                </h1>
            </a>
        </div>
    </nav>