//função de um botao de mostrar senha
function mostrarSenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btnsenha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}

function mostrarConfirmarSenha() {
    var inputConfirmarSenha = document.getElementById('confirmasenha');
    var btnShowConfirmarSenha = document.getElementById('btnconfirmarsenha');

    if (inputConfirmarSenha.type === 'password') {
        inputConfirmarSenha.setAttribute('type', 'text');
        btnShowConfirmarSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputConfirmarSenha.setAttribute('type', 'password');
        btnShowConfirmarSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}

//formata a digitação do cpf e numero

function formatarCampos() {
    var campos = document.querySelectorAll('input.cpf, input.telefone');

    campos.forEach(function (campo) {
        campo.addEventListener('input', function (e) {
            var valor = e.target.value.replace(/\D/g, '');

            if (e.target.classList.contains('cpf')) {
                // Formatação para CPF
                if (valor.length >= 3) {
                    valor = valor.replace(/^(\d{3})(\d)/, '$1.$2');
                }
                if (valor.length >= 6) {
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                }
                if (valor.length >= 9) {
                    valor = valor.replace(/(\d{3})(\d)/, '$1-$2');
                }
            } else if (e.target.classList.contains('telefone')) {
                // Formatação para número de telefone
                valor = valor.replace(/^(\d{2})(\d)/, '($1) $2');
                if (valor.length > 12) {
                    valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
                }
            }

            e.target.value = valor;
        });
    });
}

window.onload = function () {
    formatarCampos();
};
//validar se os campos foram preenchidos
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const cpf = document.getElementById("cpf").value;
        const fone = document.getElementById("perfil").value;
        const senha = document.getElementById("senha").value;
        const confirmarSenha = document.getElementById("confirmasenha").value;

        if (nome === "" || email === "" || cpf === "" || senha === "" || confirmarSenha === "") {
            event.preventDefault(); // impede o envio do cadastro se os campos estiverem vazios
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, preencha todos os campos obrigatórios.',
            });
        }
    });
});

// exibir mensagem após o cadastro utilizando SweetAlert
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const cadastroSucesso = urlParams.get('cadastro');

    if (cadastroSucesso === 'true') {
        Swal.fire({
            icon: 'success',
            title: 'Cadastro Realizado',
            text: 'Cadastro realizado com sucesso!',
        });
    }
};

//exibir mensagem no cadastro utiliza sweet.alert



