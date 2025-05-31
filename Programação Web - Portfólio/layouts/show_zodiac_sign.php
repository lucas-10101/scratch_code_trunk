<?php

try {
    $datetime = DateTime::createFromFormat('Y-m-d', $_POST['form_date']);
    $year_str = $datetime->format("Y");

    $signo = new stdClass;
    $signo->signoNome = "Erro";
    $signo->descricao = "Erro";

    foreach (simplexml_load_file('signos.xml') as $index => $_signo) {

        $inicio = DateTime::createFromFormat('d/m/Y', $_signo->dataInicio . "/" . $year_str);
        $fim = DateTime::createFromFormat('d/m/Y', $_signo->dataFim . "/" . $year_str);

        $in_range = $datetime->getTimestamp() >= $inicio->getTimestamp() && $datetime->getTimestamp() <= $fim->getTimestamp();
        if ($in_range) {
            $signo = $_signo;
            break;
        }
    }
} catch (Exception $e) {
    echo "ERRO - VERIFIQUE A ENTRADA E TENTE NOVAMENTE";
}

require_once("./header.php");
?>
<div class="placeholder"><?= $signo->signoNome ?></div>
<div class="texto-abaixo "><?= $signo->descricao ?></div>

<style>
    body {
        margin: 0;
        height: 100vh;
        background: linear-gradient(to bottom, white, rgb(77, 0, 165));
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        font-family: Arial, sans-serif;
        color: white;
        text-align: center;
    }

    .placeholder {
        margin-top: 60px;
        font-size: 3em;
        font-weight: bold;
        color: rgb(32, 0, 49);
        background: rgba(255, 255, 255, 0.6);
        padding: 10px 20px;
        border-radius: 12px;
    }

    .texto-abaixo {
        margin-top: 20px;
        font-size: 1.2em;
        max-width: 600px;
        color: #000000;
    }
</style>

<button class="w-50 mx-auto mt-5 btn btn-info" type="button" onclick="window.location.href='/'">Voltar</button>
<? require_once("./footer.php"); ?>