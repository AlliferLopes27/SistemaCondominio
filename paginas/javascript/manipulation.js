document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("moradorForm");
    // Captura os botões
    const botaoPesquisar = document.querySelector("button[name='btoPesquisar']");
    const botaoAdicionar = document.querySelector("button[name='btoAdicionar']");
    const botaoLimpar = document.querySelector("button[name='btoLimpar']");
    // Captura todos os campos do formulário
    const campos = form.querySelectorAll("input, select, textarea");
    // Captura o campo Bloco (que não deve ser limpo)
    const campoBloco = document.getElementById("txtBloco");
    // Função para remover o atributo required dos campos
    function removerRequired() {
        campos.forEach(input => input.removeAttribute("required"));
    }
    // Função para limpar os campos corretamente, exceto o Bloco
    function limparCampos() {
        removerRequired(); // Remove "required" antes de limpar
        campos.forEach(input => {
            if (input !== campoBloco) { // Não limpar o campo Bloco
                if (input.type === "radio" || input.type === "checkbox") {
                    input.checked = false; // Desmarca checkboxes e radio buttons
                } else {
                    input.value = ""; // Limpa os valores dos inputs, selects e textareas
                }
                input.setCustomValidity(""); // Remove mensagens de erro de validação do navegador
            }
        });
        // Reativa o botão Adicionar após limpar os campos
        botaoAdicionar.removeAttribute("disabled");
    }
    // Evento do botão Limpar
    botaoLimpar.addEventListener("click", function (event) {
        event.preventDefault(); // Impede o envio do formulário acidentalmente
        limparCampos();
    });
    // Evento do botão Pesquisar
    botaoPesquisar.addEventListener("click", function (event) {
        const campoPesquisar = document.getElementById("txtPesquisar");

        if (campoPesquisar.value.trim() === "") {
            event.preventDefault();
            alert("Digite um ID antes de pesquisar!");
        } else {
            removerRequired(); // Remove required antes de pesquisar
            form.submit();
        }
    });
});