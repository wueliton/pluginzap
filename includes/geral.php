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
$canonical 			= isset($blog) ? $url . "blog/" . $urlPagina : $url . $urlPagina;
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

$mapa['como-vender-whatsapp'] = array(
    "Title" => "Como fazer venda pelo whatsapp",
    "Date" => "31/07/2020",
    "Categ" => "PluginZap Ajuda",
    "Resumo" => "O whatsapp se tornou o aplicativo de troca de mensagens mais utilizado do Brasil e também é referência no mundo para conversas instantâneas, com isso, também se tornou uma poderosa ferramenta de contato direto com seus clientes..."
);
$mapa['como-adicionar-pluginzap-site'] = array(
    "Title" => "Como Adicionar o PluginZap em meu Site?",
    "Date" => "28/07/2020",
    "Categ" => "PluginZap Ajuda",
    "Resumo" => "Desenvolvemos o PluginZap para tornar mais fácil receber contatos em seu Site, e não podiamos deixar de simplificar também a intergração com seu Site, para começar a utilizar seu script do PluginZap é preciso adicionar apenas uma linha de código nas páginas em que você deseja receber mensagens..."
);