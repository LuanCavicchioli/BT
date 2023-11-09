
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

?>
    <main class="container box-center">
        
    <form action="/" method="post" class="formulario">

        <div class="bloco-agendamento">
            <div class="titulo">
                <h2>Faça seu agendamento aqui</h2>
            </div>
        </div>

        <div class="bloco-agendamento">
            <label for="hora">Hora</label>
            <input type="time" id="hora" name="hora"><br><br>
        </div>

        <div class="bloco-agendamento">
            <label for="date">Data</label>
            <input type="date" id="data" name="data"><br><br>
        </div>

        <div class="bloco-agendamento">
            <textarea id="descricao" name="descricao" rows="3" cols="40"
                placeholder="Nos informe qual seu problema"></textarea><br><br>
        </div>

        <div class="bloco-agendamento">
            <input type="submit" value="Agendar">
        </div>
    </form>
    </main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>



