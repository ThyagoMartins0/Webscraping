<?php

libxml_use_internal_errors(true);

$conteudo = file_get_contents('https://www.tabnews.com.br');
$documento = new DOMDocument();
$documento->loadHTML($conteudo);

$xPath = new DOMXPath($documento);

$domNodeList = $xPath->query('.//article[@class="Box-sc-g0xbh4-0"]');

$resultados = [];

/** @var DOMNode $elemento **/
foreach ($domNodeList as $elemento) {
    $resultados[] = [
        'conteudo' => $elemento->textContent
    ];
}

// Converte o array associativo em uma string JSON
$json = json_encode($resultados, JSON_PRETTY_PRINT);

// Exibe o JSON
echo $json;
