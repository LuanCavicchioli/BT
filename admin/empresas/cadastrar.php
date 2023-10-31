<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/cabecalho.css">
</head>
<body>
    <header class="cabecalho">
        <h1>Registro de Usuário</h1>
    </header>

    <main class="conteudo">
        <form class="formulario">
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="input-text" required>
            </div>

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" class="input-text" required>
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" class="input-text" required>
            </div>

            <button type="submit" class="botao">Registrar</button>
        </form>
    </main>

