<form id="formularioCadastro" action="" method="post" class=" login">
    <div class="form-body">
        <h2>Cadastro de Usuario</h2>

        <label for="nome">Nome Completo</label>
        <input required id="nome" type="text" name="nome" autocomplete="name">

        <label for="cpf">CPF<b id="alerta-cpf" style="display:none;">Invalido</b></label>
        <input required id="cpf" type="text" name="cpf" maxlength="14">

        <label for="email">Email</label>
        <input required id="email" type="email" name="email" autocomplete="email">

        <label for="tele">Telefone</label>
        <input required id="tele" type="tele" name="tele" autocomplete="tel-national">
        <fieldset>

            <legend>Endereço</legend>

            <label>Cep <b id="alerta-cep" style="display:none;">Invalido</b></label>
            <input required name="cep" type="text" id="cep" value="" maxlength="10"
                onblur="pesquisacep(this.value);" />
            <label>Rua</label>
            <input required name="rua" type="text" id="rua" />

            <label>Numero</label>
            <input required name="numero" type="number" id="numero">

            <label>Bairro</label>
            <input required name="bairro" type="text" id="bairro" " />
            <label>Cidade</label>
            <input required name=" cidade" type="text" id="cidade" " />
            <label>Estado</label>
            <input required name=" uf" type="text" id="uf" />
        </fieldset>

        <label for="senha">Senha</label>
        <input required id="senha" type="password" name="senha" autocomplete="new-password">

        <label class="olho" id="olho-aberto" style="display: none;">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </label>
        <label class="olho" id="olho-fechado">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </label>

        <label for="confirmar-senha">Repita a Senha</label>
        <input required id="confirmar-senha" type="password" name="confirmar-senha" autocomplete="new-password">

        <label class="olho" id="olho-aberto2" style="display: none;">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </label>
        <label class="olho" id="olho-fechado2">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </label>
        <p id="alertaSenhas" class="alerta" style="display:none;">As senhas não conferem, tente novamente</p>
        <p id="alertaDados" class="alerta" style="display:none;">Dados invalidos</p>
        <br>
        <button id="btnCadastro" type="submit" name="cadastro-sub">Cadastrar</button>
        <a href="/log">Login</a>
    </div>
</form>