<style>
    body {
        text-align: center;
    }
</style>
<?php
function texto($titulo, $cod, $descricao)
{
    echo "<div>
    <h1>$titulo</h1>
    <br>
    <p>$cod: $descricao</p>
    <br>
    <a href='/'>Retornar para pagina inicial</a>
</div>";
}
switch ($_GET["cod"]) {
    case 403:
        break;

    default:
        $titulo = "Pagina não encontrada";
        $cod = 404;
        $descricao = "A pagina Solicitada não existe, ou está fora do ar, tente novamente mais tarde";
        texto($titulo, $cod, $descricao);
        break;
}
