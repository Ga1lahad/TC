<?php
spl_autoload_register(function ($classname) {
    $classname = strtolower($classname);
    if (file_exists("../app/$classname.php")) {
        require "../app/$classname.php";
    }
});
/**Fonte:ChatGPT revisado
 * Leitura de arquivo .env para as chaves de API
 */
function loadEnv($file)
{
    // Verifica se o arquivo .env existe
    if (!file_exists($file)) {
        throw new Exception("Arquivo .env não encontrado");
    }

    // Lê o conteúdo do arquivo
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Remove espaços em branco e ignora linhas que começam com '#'
        $line = trim($line);
        if (empty($line) || $line[0] === '#') {
            continue;
        }

        // Divide a linha em chave e valor
        list($key, $value) = explode('=', $line, 2);

        // Remover espaços em branco extras
        $key = trim($key);
        $value = trim($value);

        // Define a variável de ambiente
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

// Carregar as variáveis de ambiente do arquivo .env
$file = realpath('..\\.env');
loadEnv($file);

require "routes.php";
