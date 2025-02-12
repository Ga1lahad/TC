<?php

// O token de autenticação
$token = $_ENV["mail"]; // Substitua pelo seu token de autenticação real

// A URL da API do MailerSend
$url = 'https://api.mailersend.com/v1/email';

// Os dados que serão enviados no corpo da requisição
$data = [
    'from' => [
        'email' => 'teste@trial-0p7kx4xy2z2l9yjr.mlsender.net
' // E-mail de envio
    ],
    'to' => [
        [
            'email' => 'brunodevoficial@gmail.com' // E-mail do destinatário
        ]
    ],
    'subject' => 'Confirmação de Cadastro Servicall',
    'text' => 'Greetings from the team, you got this message through MailerSend.',
    'template_id' => "neqvygm5zkw40p7w",
    'params' => [
        'token' => 'teste'  // Defina a variável do token que será substituída no template
    ]
];

// Inicializa o cURL
$ch = curl_init();

// Define as opções do cURL
curl_setopt_array($ch, [
    CURLOPT_URL => $url, // A URL da API
    CURLOPT_RETURNTRANSFER => true, // Retorna a resposta como string
    CURLOPT_POST => true, // Faz uma requisição POST
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json', // Define que o corpo da requisição está em JSON
        'X-Requested-With: XMLHttpRequest', // Cabeçalho adicional
        'Authorization: Bearer ' . $token // Cabeçalho de autenticação
    ],
    CURLOPT_POSTFIELDS => json_encode($data) // Envia os dados como JSON

]);

// Executa a requisição cURL
$response = curl_exec($ch);

// Verifica se houve erro na execução
if (curl_errno($ch)) {
    echo 'Erro cURL: ' . curl_error($ch);
} else {
    // Se a requisição foi bem-sucedida, imprime a resposta da API
    echo 'Resposta da API: ' . $response;
}

// Fecha a conexão cURL
curl_close($ch);
