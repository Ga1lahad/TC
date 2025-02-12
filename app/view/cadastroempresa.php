<style>
    .formulario {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-self: center;
        padding-inline: 20vw;

        span {
            display: grid;
            margin: 3px;
        }

        fieldset {
            padding: 10px;

            fieldset {
                display: grid;
            }
        }
    }
</style>

<div id="funcoesadm" class="card">
    <h1>Cadastro de Empresa</h1>
</div>

<div id="funcao-card" class="card inner">
    <form id="form-funcaoadm" class="formulario" method="post" action="">

        <fieldset>
            <legend>Cadastrar como Prestador de Serviço</legend>

            <span>
                <label for="cnpj">CNPJ</label>
                <input id="cnpj" name="cnpj" type="text">
            </span>

            <div id="dados_cnpj"></div>
        </fieldset>

        <button id="cnpj-submit" type="submit" disabled>Cadastrar Empresa</button>
    </form>
</div>