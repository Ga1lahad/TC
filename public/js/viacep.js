var CAMPO;
/**VIACEP Code
 * --------------------------------------------------------------------------------------------------
*/
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua' + CAMPO).value = ("");
    document.getElementById('bairro' + CAMPO).value = ("");
    document.getElementById('cidade' + CAMPO).value = ("");
    document.getElementById('uf' + CAMPO).value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua' + CAMPO).value = (conteudo.logradouro);
        document.getElementById('bairro' + CAMPO).value = (conteudo.bairro);
        document.getElementById('cidade' + CAMPO).value = (conteudo.localidade);
        document.getElementById('uf' + CAMPO).value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor, campo) {
    CAMPO = campo;
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            document.getElementById("alerta-cep" + CAMPO).style.setProperty("display", "none");
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua' + CAMPO).value = "...";
            document.getElementById('bairro' + CAMPO).value = "...";
            document.getElementById('cidade' + CAMPO).value = "...";
            document.getElementById('uf' + CAMPO).value = "...";


            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
            valido = true;
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            document.getElementById("alerta-cep" + CAMPO).style.setProperty("display", "block");
            valido = false;
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};
