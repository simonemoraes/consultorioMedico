<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe que cria um documento pdf para arquivar/imprimir
 */
class gerarPdf extends CI_Controller {

    public function index() {
        // Extrai os dados do HTML gerado pelo programa PHP
        $filename = "code.html";
        $html = file_get_contents($filename);
        $mpdf = new mPDF('', 'A4', 10, 'DejaVuSansCondensed'); // Página, fonte;

        /*
         * A conversão de caracteres foi necessária aqui, mas pode não ser no seu servidor.
         * Certifique-se disso nas configurações globais do PHP.
         * Usar codificação errada resulta em travamento.
         */
        $mpdf->allow_charset_conversion = true; //Ativa a conversão de caracteres;
        $mpdf->charset_in = 'windows-1252'; //Codificação do arquivo '$filename';
        
        /* Geração do PDF */
        // Define um Cabeçalho para o arquivo PDF
	$mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
        // Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
	// página através da pseudo-variável PAGENO
	$mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html, 0); // Carrega o conteudo do HTML criado;
        $mpdf->Output(); // Cria PDF usando 'D' para forçar o download;
        unlink($filename); // Apaga o HTML
        ob_clean(); // Descarta o buffer;
        exit();
        $this->load->view('gerador.php');
    }

}
