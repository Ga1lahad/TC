var cpfvalido = false;
var senhavalido = false;
var cepvalido = false;

document.getElementById('tele').addEventListener('input', function (e) {
    let v = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número

    if (v.length >= 11) {
        v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Formato (99) 99999-9999
    } else {
        v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3'); // Formato (99) 9999-9999
    }

    e.target.value = v;
});

/**Event Listener para impedir a inserção de qualquer letra no lugar do Cpf */
document.getElementById("cpf").addEventListener('input', function (event) {
    if (this.value.replace(/[^0-9]/g, '').length == 11) {
        if (Valida(this.value.replace(/[^0-9]/g, ''))) {
            document.getElementById("alerta-cpf").style.setProperty("display", "none");
        } else {
            document.getElementById("alerta-cpf").style.setProperty("display", "block");
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
    document.getElementById("confirmar-senha").type = "text"
});
/**Liberação para cadastro no caso de senhas caso iguais */
document.getElementById("formularioCadastro").addEventListener('submit', function (event) {
    event.preventDefault();
    let cpf = document.getElementById("cpf").value.replace(/\D/g, "")
    let senha = document.getElementById("senha");
    let outraSenha = document.getElementById("confirmar-senha");
    document.getElementById("alertaSenhas").style.setProperty("display", "none");
    senhavalido = true
    if (senha.value !== outraSenha.value) {
        senhavalido = false;
        document.getElementById("alertaSenhas").style.setProperty("display", "block");
    } else if (!Valida(cpf)) {
        cpfvalido = false;
        document.getElementById("alertaDados").style.setProperty("display", "block");
        alert("CPF Invalido, Verifique e tente novamente")
    } else if (!cepvalido) {
        alert("Parece que ha algo de errado com seu CEP, verifique e tente novamente")
    }

    if (cpfvalido && senhavalido && cepvalido) {
        this.submit();
    } else {
    }
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
    cpfvalido = true;
    return true;
}
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
    cepvalido = false;
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
            cepvalido = true;
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
