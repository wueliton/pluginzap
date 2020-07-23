<?php include 'includes/geral.php';
include 'includes/autoload.php';
ob_start("sanitize_output");
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?=$title;?> | <?=$nomeEmpresa;?></title>
  <meta name="title" content="<?=$title;?>" />
  <meta name="author" content="<?=$author;?>" />
  <meta name="description" content="<?=$description;?>" />
  <meta name="keywords" content="<?=$keywords;?>" />
  <meta name="robots" content="all" />

  <meta name="geo.region" content="BR-SP" />
  <meta name="geo.position" content="<?=$geoLatitude;?>;<?=$geoLongitude;?>" />
  <meta name="ICBM" content="<?=$geoLatitude;?>, <?=$geoLongitude;?>" />

  <!-- SEO -->
  <meta name="language" content="pt-br" />
  <meta name="copyright" content="<?=$nomeEmpresa." ".$slogan?>" />
  <meta name="distribution" content="global" />
  <meta name="audience" content="all" />
  <meta name="url" content="<?=$canonical;?>" />
  <meta name="classification" content="<?=$ramo;?>" />
  <meta name="category" content="<?=$ramo;?>" />
  <meta name="Page-Topic" content="<?=$title." - ".$nomeEmpresa;?>" />
  <meta name="rating" content="general" />
  <meta name="fone" content="<?=$tel;?>" />
  <meta name="city" content="<?=$cidade;?>" />
  <meta name="country" content="Brasil" />
  <meta property="publisher" content="<?=$creditos;?>" />

  <!-- Google -->
  <link rel="canonical" href="<?=$canonical;?>" />
  <meta name="googlebot" content="all" />
  <meta name="geo.placename" content="Brasil" />
  <meta name="geo.region" content="<?=$cidade;?>" />
  <meta name="name" content="<?=$nomeEmpresa;?>" />
  <meta name="image" content="<?=$url.$card;?>" />

  <!-- Twitter -->
  <meta name="twitter:card" content="<?=$url.$card;?>" />
  <meta name="twitter:url" content="<?=$canonical;?>" />
  <meta name="twitter:site" content="<?=$canonical;?>" />
  <meta name="twitter:title" content="<?=$title." - ".$nomeEmpresa;?>" />
  <meta name="twitter:description" content="<?=$description;?>" />
  <meta name="twitter:image" content="<?=$url.$card;?>" />

  <!-- Facebook -->
  <meta property="og:title" content="<?=$title." - ".$nomeEmpresa;?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?=$canonical;?>" />
  <meta property="og:site_name" content="<?=$nomeEmpresa;?>" />
  <meta property="og:author" content="<?=$nomeEmpresa;?>" />
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:region" content="Brasil" />
  <meta property="og:image" content="<?=$url.$card;?>" />
  <meta property="og:image:type" content="image/jpg" />
  <meta property="og:image:width" content="250" />
  <meta property="og:image:height" content="250" />
  <meta property="og:description" content="<?=$description;?>" />
  
  <link rel="icon" href="source/images/favicon.png" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="source/images/favicon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes/schema.php"); ?>
  <?php
    $cssFile = minimizeCSSsimple($cssFiles);
    echo "<style>".$cssFile."</style>";
  ?>
</head>