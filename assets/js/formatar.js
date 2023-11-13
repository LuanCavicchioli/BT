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
