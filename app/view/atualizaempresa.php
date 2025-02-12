<style>
    .formulario {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-self: center;
        padding-inline: 20vw;
    }

    .formulario span {
        display: grid;
        margin: 3px;
    }
</style>

<h1>Configurações de Página da Empresa</h1>
<div id="pagina" class="main">
    <form id="form-pagina" class="formulario" action="" method="post">


        <span>
            <label for="nome">Nome Fantasia</label>
            <input name="nome" id="nome" type="text" value="<?php echo $empresa->nome; ?>" required>
        </span>

        <span>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="5" required><?php echo $empresa->descricao; ?></textarea>
        </span>

        <span>
            <label for="sobre">Sobre</label>
            <textarea name="sobre" id="sobre" cols="30" rows="3" required><?php echo $empresa->sobre; ?></textarea>
        </span>

        <span>
            <label for="numero_contato">Número de Telefone</label>
            <input name="numero_contato" id="numero_contato" type="text" value="<?php echo $empresa->telefone; ?>" required>
        </span>

        <span>
            <label for="contato_extra">Informação Extra de Contato</label>
            <input name="contato_extra" id="contato_extra" type="text" value="<?php echo $empresa->email; ?>" required>
        </span>

        <span>
            <label for="funcionamento">Horários de Funcionamento</label>
            <input type="text" name="funcionamento" id="funcionamento" value="<?php echo $empresa->atividade_principal; ?>" required>
        </span>

        <fieldset>
            <legend>Endereço</legend>

            <span>
                <label for="cep">CEP <b id="alerta-cep" style="display:none;">Inválido</b></label>
                <input name="cep" type="text" id="cep" maxlength="10" value="<?php echo $empresa->cep; ?>" onblur="pesquisacep(this.value);" required>
            </span>

            <span>
                <label for="rua">Rua</label>
                <input name="rua" type="text" id="rua" value="<?php echo $empresa->endereco['rua']; ?>" required>
            </span>

            <span>
                <label for="numero">Número</label>
                <input name="numero" type="number" id="numero" value="<?php echo $empresa->endereco['numero']; ?>" required>
            </span>

            <span>
                <label for="cidade">Cidade</label>
                <input name="cidade" type="text" id="cidade" value="<?php echo $empresa->endereco['cidade']; ?>" required>
            </span>

            <span>
                <label for="uf">Estado</label>
                <input name="uf" type="text" id="uf" value="<?php echo $empresa->endereco['uf']; ?>" required>
            </span>
        </fieldset>
        <br>
        <label for="fileicon">Escolha o ícone:</label>
        <input type="file" id="fileicon" name="fileicon" accept="image/jpg">

        <br>
        <label for="filebanner">Escolha o banner:</label>
        <input type="file" id="filebanner" name="filebanner" accept="image/jpg">
        <br>

        <button id="pagina-submit" type="submit">Salvar Alterações</button>
    </form>
</div>