document.addEventListener("DOMContentLoaded", function (event) {
    var rua = document.getElementById("rua").value;
    var numero = document.getElementById("numero").value;
    var cidade = document.getElementById("cidade").value;
    var estado = document.getElementById("uf").value;
    invocaMapa(rua, numero, cidade, estado);
})
function invocaMapa(rua, numero, cidade, estado) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            console.log(xhttp.responseText);
        }
    };
    xhttp.open("GET", "/mapa?endereco[rua]=" + rua + "&endereco[numero]=" + numero + "&endereco[cidade]=" + cidade + "&endereco[estado]=" + estado, true);
    xhttp.send();
}