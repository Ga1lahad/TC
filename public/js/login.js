document.addEventListener("DOMContentLoaded", function (event) {
    const USER = document.getElementById("cpf");
    const PASS = document.getElementById("senha");
    document.getElementById("login").addEventListener("submit", async function (event) {
        event.preventDefault();
        USER.removeAttribute("style");
        let UserLogin = USER.value.replace(/\D/g, "");
        let PassLogin = PASS.value;
        if (UserLogin.length == 11) {
            let user = await criptografa(UserLogin);
            let pass = await criptografa(PassLogin);
            const xhr = new XMLHttpRequest();

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = "/";
                }
            };
            xhttp.open("GET", "/auth?user=" + user + "&pass=" + pass, true);
            xhttp.send();
        }
        else {
            USER.setAttribute("style", "border-color: red;");
        }
    })
})
/**Função de criptografia SHA2568*/
async function criptografa(valor) {
    let encoder = new TextEncoder();
    valor = encoder.encode(valor)
    valor = await crypto.subtle.digest('SHA-256', valor);
    valor = Array.from(new Uint8Array(valor));
    return valor.map(b => b.toString(16).padStart(2, '0')).join('');
}
// Event Listener para impedir a inserção de qualquer letra no lugar do Cpf
document.getElementById("cpf").addEventListener('input', function (event) {
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
//Responsaveis pelo olho e visualização da senha.
document.getElementById("olho-aberto").addEventListener('mouseleave', function (event) {
    let olhoFechado = document.getElementById("olho-fechado");
    olhoFechado.style.setProperty("display", "block");
    let olhoAberto = document.getElementById("olho-aberto");
    olhoAberto.style.setProperty("display", "none");
    //altera visao da senha
    document.getElementById("senha").type = "password"
});
document.getElementById("olho-fechado").addEventListener('mouseenter', function (event) {
    let olhoFechado = document.getElementById("olho-fechado");
    olhoFechado.style.setProperty("display", "none");
    let olhoAberto = document.getElementById("olho-aberto");
    olhoAberto.style.setProperty("display", "block");
    //altera visao da senha
    document.getElementById("senha").type = "text"
});