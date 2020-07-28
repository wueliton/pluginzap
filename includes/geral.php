<?php 

$nomeEmpresa = "PluginZap";
$author = "Wule Agência Digital";
$slogan = "Não perca mais nenhuma mensagem";
$ramo = "Aplicação Web";
$description = "";
$keywords = "";

$geoLatitude = "";
$geoLongitude = "";
$canonical = "";
$ramo = "";
$tel = "";
$cidade = "";
$creditos = "";
$cidade = "São Paulo";
$url = "";
$card = "";


function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/'
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

function minimizeCSSsimple($files){
    $str=file_get_contents($files);
    $str = str_replace("\n", "", $str);
    $str = preg_replace("/([0-9]*px(?!;))/", "$1 ", $str);
    $str = preg_replace('/\\s\\s+/', ' ', $str);
    return $str;
}
