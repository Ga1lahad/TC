<?php
// Corrigir situação da conexão
require_once 'conexao.php';
function CriaFiltros(): array
{
    $categorias = array();
    $sth = $BD->prepare("SELECT * FROM tags");
    $sth->execute();
    foreach ($sth->FetchAll as $row)
        if ($row['status']) {
            $categorias = new Categorias($row['id'], $row['nome'], $row['status']);
        }
    return ($categorias);
}
