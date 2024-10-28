let form_produtos = document.querySelector("#form_produtos");
let fechar_aba_produtos = document.querySelector("#fechar_aba_produtos");

//Removendo da tela formulário de cadastro quando o X for precionado
fechar_aba_produtos.addEventListener("click", (e) => {
    document.body.setAttribute("style", "overflow:none");
    form_produtos.removeAttribute("style", "display:flex");
    form_produtos.setAttribute("style", "display:none");
})

//Exibir formulário de cadastro quando botão de adicionar for precionado
let button_produtos = document.querySelector("#button_produtos");

button_produtos.addEventListener("click", (e) => {
    document.body.setAttribute("style", "overflow:hidden");
    form_produtos.removeAttribute("style", "display:none");
    form_produtos.setAttribute("style", "display:flex");

});

