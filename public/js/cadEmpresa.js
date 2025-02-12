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
            valido = false;
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
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

/**Mascara de CNPJ creditos para https://gist.github.com/fernandovaller/b10a3be0e7b3b46e5895b0f0e75aada5 */
document.getElementById("cnpj").addEventListener('input', function (event) {
    if (this.value.length > 18) {
        this.value = this.value.substring(0, this.value.length - 1)
    } else {
        let v = this.value;
        v = v.replace(/\D/g, "")                           //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
        v = v.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
        this.value = v;
    }
});
/**Api De CNPJ */
document.getElementById("cnpj").addEventListener('blur', function (event) {
    let cnpj = this.value.replace(/\D/g, '');
    if (cnpj.length === 14) {
        const data = null;

        const xhr = new XMLHttpRequest();

        xhr.addEventListener('readystatechange', function () {
            if (this.readyState === this.DONE) {
                document.getElementById("dados_cnpj").innerHTML = this.responseText
                estado = document.getElementById("resposta").value;
                if (estado == "ATIVA") {
                    document.getElementById("cnpj-submit").removeAttribute("disabled");
                }
            }
        });

        xhr.open('GET', '/cnpj?cnpj=' + cnpj);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.send();
        if (condition) {

        }
    } else {
        console.log("CNPJ Invalido")
    }

})
