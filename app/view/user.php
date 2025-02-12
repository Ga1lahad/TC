<h1 id="titulo"><?php echo $_SESSION["nome"]; ?></h1>
<div id="main">
    <br>
    <div id="informacoes" class="card">
        <h1>Informações da Conta</h1>
        <span class="setas">
            <svg id="fechado-informacao" style="display: block;" width="2.5rem" height="2.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#0F0F0F" />
            </svg>
            <svg id="aberto-informacao" style="display: none;" width="2.5rem" height="2.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#0F0F0F" />
            </svg>
    </div>
    <div id="info-card" class="card inner" style="display: none;">
        <form id="form-informacao" class="formulario" action="">
            <span>
                <label for="nome">Nome Completo</label>
                <input id="nome" type="text" name="nome" autocomplete="name">

                <label for="cpf">CPF<b id="alerta-cpf" style="display:none;">Invalido</b></label>
                <input id="cpf" type="text" name="cpf" maxlength="14">

                <label for="email">Email</label>
                <input id="email" type="email" name="email" autocomplete="email">

                <label for="tele">Telefone</label>
                <input id="tele" type="tele" name="tele" autocomplete="tel-national">
            </span>
            <span>
                <label for="senha">Senha Atual</label>
                <input id="senha" type="password" name="senha" autocomplete="current-password" required>

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

                <label for="nova-senha">Nova Senha</label>
                <input id="nova-senha" type="password" name="nova-senha" autocomplete="new-password">

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

                <label for="confirmar-senha">Repita a Senha</label>
                <input id="confirmar-senha" type="password" name="confirmar-senha" autocomplete="new-password">

                <label class="olho" id="olho-aberto3" style="display: none;">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </label>
                <label class="olho" id="olho-fechado3">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </label>
                <p id="alertaSenhas" class="alerta" style="display:none;">As senhas não conferem, tente novamente</p>
                <p id="alertaDados" class="alerta" style="display:none;">Dados invalidos</p>
                <button name="subAlt-Senha" type="submit">Alterar Senha</button>
            </span>
            <br>
            <fieldset>
                <legend>Endereço</legend>

                <label>Cep <b id="alerta-cep0" style="display:none;">Invalido</b></label>
                <input name="cep0" type="text" id="cep0" value="" maxlength="10"
                    onblur="pesquisacep(this.value,0);" />
                <label>Rua</label>
                <input name="rua0" type="text" id="rua0" />

                <label>Numero</label>
                <input name="numero" type="number" id="numero">

                <label>Bairro</label>
                <input name="bairro0" type="text" id="bairro0" " />
            <label>Cidade</label>
            <input  name=" cidade0" type="text" id="cidade0" " />
            <label>Estado</label>
            <input  name=" uf0" type="text" id="uf0" />
            </fieldset>
            <button name="subForm" type="submit">
                Salvar Alterações
            </button>
        </form>
    </div>
    <!-- ------------------------------------- -->
    <hr>
    <button href="/atualizaEmpresa">Atualizar Pagina da Empresa</button>
    <button href="/cadEmpresa">Cadastrar empresa</button>
    <span id="logout-span">
        <button href="/logout">Fazer Logout</button>
    </span>
</div>