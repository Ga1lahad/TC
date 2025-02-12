<div id="pagina-card" class="card inner" style="display: none;">
    <form id="form-pagina" class="formulario"
        action="">
        <span>
            <label for="nome">Nome fantasia</label>
            <input name="nome" type="text">

            <label for="decricao">Descrição</label>
            <textarea name="decricao" id="decricao" cols="30" rows="5"></textarea>

            <label for="sobre">Sobre</label>
            <textarea name="sobre" id="sobre" cols="30" rows="3"></textarea>
        </span> <span>
            <label for="numeroContato">Numero de telefone</label>
            <input name="numeroContato" type="text">

            <label for="contatoExtra">Informação extra de contato</label>
            <input name="contatoExtra" type="text">


            <label for="funcionamento">Horarios de funcionamento</label>
            <input type="text" name="" id="">
        </span>
        <fieldset>
            <legend>Endereço</legend>
            <label>Cep <b id="alerta-cep2" style="display:none;">Invalido</b></label>
            <input name="cep2" type="text" id="cep" value="" maxlength="10 require"
                onblur="pesquisacep(this.value,2);" value="' . $rs->cep . '" required>
            <label>Rua</label>
            <input name="rua2" type="text" id="rua2" value="" required>

            <label>Numero</label>
            <input name="numero2" type="number" id="numero2" value="" required>

            <label>Bairro</label>
            <input name="bairro2" type="text" id="bairro2" value="" required>

            <label>Cidade</label>
            <input name="cidade2" type="text" id="cidade2" " value='' require>

            <label>Estado</label>
            <input  name=" uf2" type="text" id="uf2" value="" required>
        </fieldset>
        <button id="pagina-submit" type="submit" disabled>Salvar alterações</button>
    </form>
    <form action=""></form>
</div>