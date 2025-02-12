function verificarImagens() {
    const iconeInput = document.getElementById('icone');
    const bannerInput = document.getElementById('banner');
    const mensagem = document.getElementById('mensagem');

    let erro = false;
    mensagem.textContent = '';
    function verificarDimensao(imagem, tipo) {
        const img = new Image();
        img.onload = function () {
            if (tipo === 'icone' && (img.width !== 256 || img.height !== 256)) {
                erro = true;
                mensagem.textContent = 'O ícone precisa ter 256x256 pixels.';
            } else if (tipo === 'banner' && (img.width !== 468 || img.height !== 90)) {
                erro = true;
                mensagem.textContent = 'O banner precisa ter 468x90 pixels.';
            }
            if (!erro) {
                mensagem.textContent = 'Imagens válidas!';
            }
        };
        img.src = URL.createObjectURL(imagem);
    }
    if (iconeInput.files && iconeInput.files[0]) {
        const icone = iconeInput.files[0];
        verificarDimensao(icone, 'icone');
    }
    if (bannerInput.files && bannerInput.files[0]) {
        const banner = bannerInput.files[0];
        verificarDimensao(banner, 'banner');
    }
}

/**VIACEP Code
 * --------------------------------------------------------------------------------------------------
*/
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
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
    ;
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica s cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            valido = false;
            document.getElementById("alerta-cep").style.setProperty("display", "none");
            //Preenche os com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
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
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};