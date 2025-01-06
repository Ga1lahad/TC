/**Responsavel por expandir e retrair os respectivos menus*/
var estadoinfo = false;
var estadoopcoes = false;
var estadofuncadm = false;
document.getElementById("informacoes").addEventListener('click', function (event) {
    let fechado = document.getElementById("fechado-informacao");
    let aberto = document.getElementById("aberto-informacao");
    if (estadoinfo) {
        estadoinfo = false;
        aberto.style.setProperty("display", "none");
        document.getElementById("info-card").style.setProperty('display', "none");
        fechado.style.setProperty("display", "block");
    } else {
        estadoinfo = true;
        aberto.style.setProperty("display", "block");
        document.getElementById("info-card").style.setProperty('display', "block");
        fechado.style.setProperty("display", "none");
    }
});

document.getElementById("opcoes").addEventListener('click', function (event) {
    let fechado = document.getElementById("fechado-opcoes");
    let aberto = document.getElementById("aberto-opcoes");
    if (estadoopcoes) {
        estadoopcoes = false;
        aberto.style.setProperty("display", "none");
        document.getElementById("opcao-card").style.setProperty('display', "none");
        fechado.style.setProperty("display", "block");
    } else {
        estadoopcoes = true;
        aberto.style.setProperty("display", "block");
        document.getElementById("opcao-card").style.setProperty('display', "block");
        fechado.style.setProperty("display", "none");

    }
});

document.getElementById("funcoesadm").addEventListener('click', function (event) {
    let fechado = document.getElementById("fechado-funcoesadm");
    let aberto = document.getElementById("aberto-funcoesadm");
    if (estadofuncadm) {
        estadofuncadm = false;
        aberto.style.setProperty("display", "none");
        document.getElementById("funcao-card").style.setProperty('display', "none");
        fechado.style.setProperty("display", "block");
    } else {
        estadofuncadm = true;
        aberto.style.setProperty("display", "block");
        document.getElementById("funcao-card").style.setProperty('display', "block");
        fechado.style.setProperty("display", "none");
    }
});
/**Eventos controladores dos olhos para apresentar senha*/
document.getElementById("olho-aberto").addEventListener('mouseout', function (event) {
    let olhoFechado = document.getElementById("olho-fechado");
    olhoFechado.style.setProperty("display", "block");
    let olhoAberto = document.getElementById("olho-aberto");
    olhoAberto.style.setProperty("display", "none");
    //altera visao da senha
    document.getElementById("senha").type = "password"
});
document.getElementById("olho-aberto2").addEventListener('mouseout', function (event) {
    let olhoFechado = document.getElementById("olho-fechado2");
    olhoFechado.style.setProperty("display", "block");
    let olhoAberto = document.getElementById("olho-aberto2");
    olhoAberto.style.setProperty("display", "none");
    //altera visao da senha
    document.getElementById("nova-senha").type = "password"
});
document.getElementById("olho-aberto3").addEventListener('mouseout', function (event) {
    let olhoFechado = document.getElementById("olho-fechado3");
    olhoFechado.style.setProperty("display", "block");
    let olhoAberto = document.getElementById("olho-aberto3");
    olhoAberto.style.setProperty("display", "none");
    //altera visao da senha
    document.getElementById("confirmar-senha").type = "password"
});
document.getElementById("olho-fechado").addEventListener('mouseenter', function (event) {
    let olhoFechado = document.getElementById("olho-fechado");
    olhoFechado.style.setProperty("display", "none");
    let olhoAberto = document.getElementById("olho-aberto");
    olhoAberto.style.setProperty("display", "block");
    //altera visao da senha
    document.getElementById("senha").type = "text"
});
document.getElementById("olho-fechado2").addEventListener('mouseenter', function (event) {
    let olhoFechado = document.getElementById("olho-fechado2");
    olhoFechado.style.setProperty("display", "none");
    let olhoAberto = document.getElementById("olho-aberto2");
    olhoAberto.style.setProperty("display", "block");
    //altera visao da senha
    document.getElementById("nova-senha").type = "text"
});
document.getElementById("olho-fechado3").addEventListener('mouseenter', function (event) {
    let olhoFechado = document.getElementById("olho-fechado3");
    olhoFechado.style.setProperty("display", "none");
    let olhoAberto = document.getElementById("olho-aberto3");
    olhoAberto.style.setProperty("display", "block");
    //altera visao da senha
    document.getElementById("confirmar-senha").type = "text"
});
/**Limita o numero max de caracteres no numero da casa */
document.getElementById("numero").addEventListener('input', function (event) {
    if (this.value.length > 4) { this.value = this.value.slice(0, 4); }
});
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
            }
        });

        xhr.open('GET', '/cnpj?cnpj=' + cnpj);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.send();
    } else {
        console.log("CNPJ Invalido")
    }

})

/**Event Listener para impedir a inserção de qualquer letra no lugar do Cpf */
document.getElementById("cpf").addEventListener('input', function (event) {
    if (this.value.replace(/[^0-9]/g, '').length == 11) {
        if (Valida(this.value.replace(/[^0-9]/g, ''))) {
            document.getElementById("alerta-cpf").style.setProperty("display", "none");
            valido = true;
        } else {
            document.getElementById("alerta-cpf").style.setProperty("display", "block");
            valido = false;
        }
    } else { document.getElementById("alerta-cpf").style.setProperty("display", "none"); }

    if (event.inputType === "deleteContentBackward") {
        return
    }
    this.value = this.value.replace(/[^0-9.-]/g, '');
    if (this.value.length === 3 || this.value.length === 7) {
        this.value += "."
    } else if (this.value.length === 11) {
        this.value += "-"
    } else { return }
});
/**Aplicação de mascara on key up para correção de bug da implementação anterion on input */
document.getElementById("cpf").addEventListener('keyup', function (event) {
    if (event.key === "Backward") {
        return
    }
    if (this.value.length >= 12) {
        let substring = this.value.split('');
        if (substring[3] != "." || substring[7] != "." || substring[11] != "-") {
            substring[3] = ".";
            substring[7] = ".";
            substring[11] = "-";
            this.value = substring.join('');
        }
    }
    else if (this.value.length >= 8) {
        let substring = this.value.split('');
        if (substring[3] != "." || substring[7] != ".") {
            substring[3] = ".";
            substring[7] = ".";
            this.value = substring.join('');
        }
    }
    else if (this.value.length >= 4) {
        let substring = this.value.split('');
        if (substring[3] != ".") {
            substring[3] = ".";
            this.value = substring.join('');
        }
    }
    else { return }
});
/**Teste de CPF
 * --------------------------------------------------------------------------------------------------
*/
function Valida(cpf) {
    let Soma = 0;
    let Resto;
    if (cpf == "00000000000") return false;

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11))) return false;
    return true;
}
/**VIACEP Code
 * --------------------------------------------------------------------------------------------------
*/
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            document.getElementById("alerta-cep").style.setProperty("display", "none");
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";


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
            document.getElementById("alerta-cep").style.setProperty("display", "block");
            valido = false;
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};
