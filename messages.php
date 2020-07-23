<?php
$title = "Mensagens";
$cssFiles = "source/css/panel.css";
$page = "messages";
include("includes/head-panel.php");
$enterprises = new \Includes\Enterprises\Enterprise();
?>
<body>
    <?php include("includes/panel-navbar.php"); ?>
    <div class="titleHeader">
        <h1>Mensagens</h1>
        <div class="tabs">
            <a href="javascript:void(0)" class="active" id="noFilter">Todas</a>
            <a href="javascript:void(0)" id="filterNotRead">Não lidas</a>
        </div>
    </div>
    <div class="contentPage active">
        <div class="queryContent">
            <span class="query"><input type="text" placeholder="Buscar"></span>
            <ul class="filter">
                <li><a href="javascript:void(0)" class="filterBtn">Filtrar Resultados</a>
                    <ul>
                        <li>
                            <span class="title">Data</span>
                            <ul class="optionsOrder">
                                <li><a href="javascript:void(0)" data-order="DESC" class="asc active">Mais recente</a></li>
                                <li><a href="javascript:void(0)" data-order="ASC" class="desc">Mais antigo</a></li>
                                <li>
                                    <a href="javascript:void(0)" data-order="BETWEEN" class="between">Entre datas</a>
                                    <div class="optionsFilter">
                                        <input type="datetime-local" id="between">
                                        <input type="datetime-local" id="andBetween">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span class="title">Empresas</span>
                            <ul class="group">
                                <li><label><input type="checkbox" id="all" checked> Todas</label></li>
                                <?php
                                    $enterprises->listEnterprises();
                                ?>
                                <!--<li><label><input type="checkbox" data-id="20" checked> PluginZap</label></li>
                                <li><label><input type="checkbox" data-id="21" checked> Casas Bahia</label></li>-->
                            </ul>
                        </li>
                        <li class="apply"><a href="javascript:void(0)" id="applyFilter" class="btn-primary">Aplicar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <table class="contatos" id="messagesList">
            <thead>
                <tr>
                    <td></td>
                    <td width="100%">
                        Mensagem
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
                $enterprises->listMessages();
            ?>
            </tbody>
        </table>

        <!--<div class="table-overFlow">
            <table class="contatos">
                <tr>
                    <td>Nome</td>
                    <td>Mensagem</td>
                    <td>E-mail</td>
                    <td>Celular</td>
                </tr>
                <tr>
                    <td><a href="">Alexandre</a></td>
                    <td>Olá, poderia nos informar...</td>
                    <td><a href="">alexandre@example.com.br</a></td>
                    <td><a href="">11 90000-0000</a></td>
                </tr>
                <tr>
                    <td><a href="">Alexandre</a></td>
                    <td>Olá, poderia nos informar...</td>
                    <td><a href="">alexandre@example.com.br</a></td>
                    <td><a href="">11 90000-0000</a></td>
                </tr>
                <tr>
                    <td><a href="">Alexandre</a></td>
                    <td>Olá, poderia nos informar...</td>
                    <td><a href="">alexandre@example.com.br</a></td>
                    <td><a href="">11 90000-0000</a></td>
                </tr>
                <tr class="numbers">
                    <td colspan="4">
                        Mostrando 3 de 3 Mensagens
                    </td>
                </tr>
            </table>
        </div>-->
    </div>
    <?php include("includes/panel-footer.php"); ?>