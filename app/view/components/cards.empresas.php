<?php

/**Formata o valor numerico bruto de 11 ou 10 digitos para numeros de telefone identados*/
function telefone($telefone)
{
    if (strlen($telefone) == 11) {
        $telefoneFormatado = preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $telefone);
        return $telefoneFormatado;
    } elseif (strlen($telefone) == 10) {
        $telefoneFormatado = preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        return $telefoneFormatado;
    }
}
echo "<div class='card'>
    <a class='card-body' href='/empresa?id=" . $empresa->id . "'>
        <img src='imgs/logo.png' alt=''>
        <h1>$empresa->nome</h1>
        <p id='sobre'>$empresa->sobre</p>
        <p>" . telefone($empresa->telefone) . "</p>";
require 'geradorDeMapaCard.php';
echo '
</a></div>';
