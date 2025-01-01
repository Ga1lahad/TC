<form action="" method="post" class=" login login-active">

    <div class="form-body">
        <h2>Login</h2>
        <label for="cpf">CPF</label>
        <input id="cpf" type="text" name="cpf" maxlength="14">
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha">
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
        <br>
        <button type="submit" name="login-sub">Entrar</button>
        <a href="   ">Cadastrar-se</a>
        <a href="">Esqueceu a senha (Não implementado ainda)</a>
    </div>
</form>