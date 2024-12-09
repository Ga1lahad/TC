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