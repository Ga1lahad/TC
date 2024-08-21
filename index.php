<?php
// Tela com menos de 420 de Width tem que alterar o layout da logo e User
require_once "php/autoload.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="header">
        <div class="logo">
            <h1>logo</h1>
        </div>
        <div class="search">
            <form action="">
                <input type="search" placeholder="Pesquisa por serviço ou empresa">
            </form>
        </div>
        <div class="user">
            <h1>User</h1>
        </div>
    </div>
    <?php require_once "html/home.html" ?>
</body>

</html>
<script src="js/index.js"></script>