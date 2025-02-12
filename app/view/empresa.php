<?php
function telefone($telefone)
{
    if (strlen($telefone) == 11) {
        $telefoneFormatado = preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $telefone);
        return $telefoneFormatado;
    } elseif (strlen($telefone) == 10) {
        $telefoneFormatado = preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        return $telefoneFormatado;
    }
} ?>
<div id="main">
    <span id="banner" style="background-image:url(imgs/banner.png);">
        <img id="icone" src="imgs/logo.png" alt="icone da <?php echo $empresa->nome; ?>">
    </span>
    <span class="title"></span>
    <h1 style="padding-left:300px;"><?php echo $empresa->nome ?></h1>
    <p style="padding-left:300px;"><b><?php echo $empresa->pontos ?> / 5</b></p>
    <br>

    <div id="info">
        <div id="setor1" class="setor">
            <h3>Descrição:</h3>
            <p><?php echo $empresa->descricao ?></p>
        </div>
        <div id="setor1" class="setor">
            <h3>Contatos:</h3>
            <p><?php echo telefone($empresa->telefone) ?></p>
            <p><?php echo $empresa->email ?></p>
            <h3>Horarios de Atendimento:</h3>
            <p>Segunda a Sexta 9:00 as 18:00</p>
        </div>
    </div>

    <div id="servicos">
        <h1>Serviços Fornecidos</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome do Serviço</th>
                    <th>Descriçao</th>
                    <th>Valor</th>
                    <th>Pontuaçao</th>
                </tr>
            </thead>
            <tbody>
                <?php


                foreach ($listaServico as $servico) {
                    if ($servico->valor == 0) {
                        $servico->valor = "Necessario orçamento";
                    }
                    echo "         <tr>
                    <td>$servico->nome</td>
                    <td>$servico->descricao</td>
                    <td><b>$servico->valor</b></td>
                    <td><b>$servico->pontos / 5</b></td>
                </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
    <br>
    <div id="mapa">
        <h1>Localização</h1>
        <p>
            <?php
            foreach ($empresa->endereco as $linha) {
                echo $linha . ", ";
            }
            ?></p>
        <?php include("components/geradorDeMapa.php") ?>
    </div>
</div>