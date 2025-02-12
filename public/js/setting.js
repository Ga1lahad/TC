/**Responsavel por expandir e retrair os respectivos menus*/
var estadoinfo = false;
var estadopagina = false;
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
