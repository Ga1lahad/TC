<?php
try {
    $BD = new PDO('mysql:host=localhost;dbname=tc', 'root',);
} catch (PDOException $e) {
    echo 'Erro De conexão no Banco de dados: ' . $e->getMessage();
}
