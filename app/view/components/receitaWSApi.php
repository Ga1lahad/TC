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
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {

    $rs = json_decode($response);
    echo "<p><b>Situação:</b> $rs->situacao</p>";
    echo "<p><b>Em nome de:</b> $rs->nome</p>";
    echo '<p><b>Atividade Principal:</b> ' . $rs->atividade_principal[0]->text . '</p>';
    echo '<p><b>Atividade Secundaria:</b> ' . $rs->atividades_secundarias[0]->text . '</p>';

    echo "<label for='cnpj-telefone'>Telefone</label> <input id='cnpj-telefone' name='cnpj-telefone' type='text' value='$rs->telefone'>";

    echo "<label for='cnpj-email'>Email</label> <input id='cnpj-email' name='cnpj-email' type='text' value='$rs->email'>";

    echo '<fieldset>

                <legend>Endereço</legend>

                <label>Cep <b id="alerta-cep" style="display:none;">Invalido</b></label>
                <input name="cep" type="text" id="cep" value="" maxlength="10"
                    onblur="pesquisacep(this.value);" value="' . $rs->cep . '">
                <label>Rua</label>
                <input name="rua" type="text" id="rua" value="' . $rs->logradouro . '">

                <label>Numero</label>
                <input name="cnpj-numero" type="number" id="cnpj-numero" value="' . $rs->numero . '">

                <label>Bairro</label>
                <input name="bairro" type="text" id="bairro" value="' . $rs->bairro . '">

            <label>Cidade</label>
            <input  name=" cidade" type="text" id="cidade" " value=' . $rs->municipio . '>

            <label>Estado</label>
            <input  name=" uf" type="text" id="uf" value="' . $rs->uf . '">
            </fieldset>';
}
