// Função para formatar o RG
function formatarRG(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    // Limitar a quantidade de caracteres no campo para RG (9 dígitos)
    if (valor.length > 9) {
    valor = valor.substring(0, 9); // Limita para 9 caracteres
    }
    // Formatar como RG (XX.XXX.XXX-X)
    if (valor.length <= 9) {
    valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4'); // Formato XX.XXX.XXX-X
    }

    input.value = valor;
}
// Função para formatar o CPF
function formatarCPF(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    // Limitar a quantidade de caracteres no campo para CPF (11 dígitos)
    if (valor.length > 11) {
    valor = valor.substring(0, 11); // Limita para 11 caracteres
    }
    // Formatar como CPF (XXX.XXX.XXX-XX)
    if (valor.length <= 11) {
    valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }

    input.value = valor;
}
// Função para formatar o CNPJ
function formatarCNPJ(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    // Limitar a quantidade de caracteres no campo para CNPJ (14 dígitos)
    if (valor.length > 14) {
    valor = valor.substring(0, 14); // Limita para 14 caracteres
    }
    // Formatar como CNPJ (XX.XXX.XXX/XXXX-XX)
    if (valor.length === 14) {
    valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    }

    input.value = valor;
}
// Função para formatar o Telefone com 11 dígitos
function formatarTelefone(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    // Limitar a quantidade de caracteres no campo para Telefone (11 dígitos)
    if (valor.length > 11) {
    valor = valor.substring(0, 11); // Limita para 11 caracteres
    }
    // Formatar como telefone (XX) XXXXX-XXXX
    if (valor.length === 11) {
    valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formato (XX) XXXXX-XXXX
    }

    input.value = valor;
}
// Função para limitar no máximo em 3 números
function limitarNúmero(input) {
    let valor = input.value;
    // Limitar o valor a no máximo 3 dígitos
    if (valor.length > 3) {
    input.value = valor.substring(0, 3);  // Restringe para 3 dígitos
    }
}