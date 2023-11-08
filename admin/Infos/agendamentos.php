<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php"; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/agendamento.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <title>Agendamentos - BuscaTec</title>
</head>
<body>
    <form action="/" method="post">

        <div class="agent">
            <div class="titulo"><h2>Faça seu agendamento aqui</h2></div>

            <div class="Hora">
            <label for="hora">Hora</label>
            <input type="time" id="hora" name="hora"><br><br>
            </div>
            
            <div class="data">
                <label for="date">Data</label>
                <input type="date" id="data" name="data"><br><br>
            </div>

            <div class="descricao">
            <textarea id="descricao" name="descricao" rows="3" cols="40" placeholder="Nos informe qual seu problema"></textarea><br><br>
            </div>

            <div class="botao">
            <input type="submit" value="Agendar">
            </div>
            
    </form>
    
</body>
</html>


<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; 

?>