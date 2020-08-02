<?php 

$pastaEPagina = explode("/",$_SERVER['PHP_SELF']);
$pastaDominio = "";
for($i=0; $i < count($pastaEPagina); $i++){
	if(substr_count($pastaEPagina[$i], ".") == 0 && $pastaEPagina[$i]!="blog"){
		$pastaDominio .= $pastaEPagina[$i]."/";
	}
}

$url = "http://".$_SERVER['HTTP_HOST'].$pastaDominio;
$nomeEmpresa = "PluginZap";
$author = "Wule Agência Digital";
$slogan = "Não perca mais nenhuma mensagem";
$ramo = "Aplicação Web";

$geoLatitude = "-23421459";
$geoLongitude = "-46551149";
$endereco = "Viela Particular, 56";
$tel = "11940043902";
$cidade = "Guarulhos";
$creditos = "";
$cidade = "São Paulo";
$email = "suporte@pluginzap.com";
$uf = "SP";
$cep = "07075-171";
$logoSchema = "source/images/card.jpg";
$card = isset($card) ? $card : "source/images/card.jpg";
$urlPagina 			= explode("C:/", $_SERVER['PHP_SELF']);
$urlPagina 			= end($urlPagina);
$urlPagina			= explode("/", $urlPagina);
$urlPagina 			= end($urlPagina);
$canonical 			= $url . $urlPagina;
$canonical 			= str_replace('.php', '', $canonical);
$imagem 			= str_replace('.php', '.jpg', $urlPagina);


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
