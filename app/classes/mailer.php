<?php

namespace Classes;

use Exception;
use PDO;
use PDOException;

class Mailer
{
    private static $apiUrl = 'https://api.mailersend.com/v1/email';
    private static $fromEmail = 'teste@trial-0p7kx4xy2z2l9yjr.mlsender.net'; // E-mail de envio

    private static $Templates = [
        "Recuperacao" => "0p7kx4xoqw249yjr",
        "Confirmacao" => "neqvygm5zkw40p7w",
        "ConfirmacaoCnpj" => ""
    ];

    public static function Email($Para, $Assunto, $ArrayParametros, $TemplateKey)
    {
        $token = $_ENV["mail"]; // Token de autenticação

        $data = [
            'from' => ['email' => self::$fromEmail],
            'to' => [
                ['email' => $Para]
            ],
            'subject' => $Assunto,
            'text' => 'Email automatico de cadastro.',
            'template_id' => self::$Templates[$TemplateKey],
            'params' => $ArrayParametros
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => self::$apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Authorization: Bearer ' . $token
            ],
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Erro cURL mailer: ' . curl_error($ch));
        }

        curl_close($ch);
        return $response;
    }
}
