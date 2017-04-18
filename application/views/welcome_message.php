<!DOCTYPE html>
<?php
ob_start();
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;"/>
        <meta name="author" content="Claudio Souza Jr. <claudio@uerr.edu.br>"/>
        <meta name="created" content="18/12/2015"/>
        <meta name="version" content="1.0"/>
        <meta name="changed" content="20/12/2015"/>
        <title>Teste mPDF</title>
        <link rel='icon' type='image/png' href='favicon.png'>
        <!-- Nao defina atributos para a folha de estilos -->
        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    
    <a href="<?= base_url("index.php/gerarPdf") ?>" target="_blank">Gerar Pdf</a>
    <body>
        <h3>Pdf gerado</h3>
        
    </body>
</html>
<?php
/* Captação de dados */
$buffer = ob_get_contents(); // Obtém os dados do buffer interno
$filename = "code.html"; // Nome do arquivo HTML
file_put_contents($filename, $buffer); // Grava os dados do buffer interno no arquivo HTML
?>
