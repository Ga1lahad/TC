<?php
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://receitaws.com.br/v1/cnpj/$CNPJ",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Accept: application/json"
    ],
]);

$response = curl_exec($curl);
curl_close($curl);

if (strlen($response) < 100) {
    echo "<p>Ocorreu um erro ao Pesquisar pelo <b>CNPJ</b>, Tente novamente em alguns minutos</p>";
} else {

    $rs = json_decode($response);
    echo "<p><b>Situação:</b> $rs->situacao</p>";
    echo "<p><b>Em nome de:</b> $rs->nome</p>";
    echo '<p><b>Atividade Principal:</b> ' . $rs->atividade_principal[0]->text . '</p>';
    echo '<p><b>Atividade Secundaria:</b> ' . $rs->atividades_secundarias[0]->text . '</p>';
    echo '<p><b>Telefone:</b> ' . $rs->telefone . '</p>';
    echo '<p>Será <b>necessário</b> confirmação no email, <b>Email:</b> ' . $rs->email . '</p>';

    // echo "<label for='cnpj-telefone'>Telefone</label> <input id='cnpj-telefone' name='cnpj-telefone' type='text' value='$rs->telefone' disable>";

    // echo "<label for='cnpj-email'>Email</label> <input id='cnpj-email' name='cnpj-email' type='text' value='$rs->email'>";

    echo '<fieldset>

                <legend>Endereço</legend>

                <label>Cep <b id="alerta-cep1" style="display:none;">Invalido</b></label>
                <input name="cep" type="text" id="cep" value="" maxlength="10 require"
                    onblur="pesquisacep(this.value,1);" value="' . $rs->cep . '" required>
                <label>Rua</label>
                <input name="rua1" type="text" id="rua1" value="' . $rs->logradouro . '" required>

                <label>Numero</label>
                <input name="cnpj-numero" type="number" id="cnpj-numero" value="' . $rs->numero . '" required>

                <label>Bairro</label>
                <input name="bairro1" type="text" id="bairro1" value="' . $rs->bairro . '" required>

            <label>Cidade</label>
            <input  name="cidade1" type="text" id="cidade1" " value=' . $rs->municipio . 'require>

            <label>Estado</label>
            <input  name="uf1" type="text" id="uf1" value="' . $rs->uf . '" required>
            </fieldset>
            <input hidden type="text" id="resposta" value ="' . $rs->situacao . '" required>';
}
