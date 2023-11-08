<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/js/exibirsenha.js";

$usuarioController = new UsuarioController();

$usuarioController->cadastrarUsuario();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/cadastro.css">
    <title>BuscaTec- Cadastro</title>
</head>

<body id="principal">

    <div id="login">

        <div class="caixa">

            <img src="/assets/img/a.png" alt="">
            <h1>Cadastrar</h1>
            <form action="cadastrar.php" method="post">

                <div class="name">
                    <input type="name" name="nome" id="nome" placeholder="Nome">
                </div>

                <div class="email">
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>

                <div class="cpf">
                    <input type="cpf" name="cpf" id="cpf" placeholder="CPF">
                </div>

                <div class="telefone">
                    <input type="telefone" name="fone" id="fone" placeholder="Telefone">
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <i class="bi bi-eye-fill" id= onclick="mostrarSenhaOculta()"></i>

                </div>
                <div class="confirmarsenha">
                    <input type="password" name="senha" id="senha" placeholder="Confirmar Senha">
      
                </div>


                <div class="entrar">
                    <p>Ja possui cadastro? <a href="/admin/admin/login.php">Entre agora.</a></p>
                    <input type="submit" value="Cadastrar">
                </div>
            </form>

        </div>

    </div>

    <script>

        document.getElementById('cpf').addEventListener('input', function (e) {
            // Remove caracteres não numéricos
            var cpf = e.target.value.replace(/\D/g, '');


            if (cpf.length >= 3) {
                cpf = cpf.replace(/^(\d{3})(\d)/, '$1.$2');
            }
            if (cpf.length >= 6) {
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            }
            if (cpf.length >= 9) {
                cpf = cpf.replace(/(\d{3})(\d)/, '$1-$2');
            }

            e.target.value = cpf;
        });

        function mostrarSenhaOculta() {
            var senha = document.getElementById("senha");
            if (senha.type === "password") {
                senha.type = "text";
            } else {
                senha.type = "password";
            }
        }

    </script>

</body>

</html>













<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>