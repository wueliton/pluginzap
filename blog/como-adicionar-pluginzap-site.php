<?php
$title = "Como Adicionar o PluginZap em meu Site?";
$cssFiles = "../source/css/blog.css";
$description = "O PluginZap pode ser adicionado ao seu Site HTML, Wordpress, Wix, PHP, e outras linguagens, ensinamos nesse tutorial a inserir em seu site.";
$keywords = "Melhor plugin em {$title},Melhor aplicativo em {$title},Adicionar o WhatsApp em meu Site,Melhor preço de {$title}";
include("../includes/headerBlog.php");
?>
<nav>
    <ul>
        <li><a href="<?php echo $url?>"><img src="../source/images/logo.png" alt="PluginZap"></a><a href="" class="blog">BLOG</a></li>
        <ul>
            <li><a href="../login">Login</a></li>
            <li><a href="../join" class="btn-testar">GANHE 1 MÊS PARA TESTAR</a></li>
        </ul>
    </ul>
</nav>
<img src="images/como-adicionar-pluginzap-site.jpg" alt="<?=$title?>" class="principal-image" title="<?=$title?>">
<article>
    <div class="content">
        <h1><?=$title?></h1>
        <div class="postDetails"><a href="#" class="category">PluginZap Ajuda</a> <span class="date"> Postado em <a href="#">28/07/2020</a></span></div>
        <p>Desenvolvemos o PluginZap para tornar mais fácil receber contatos em seu Site, e não podiamos deixar de simplificar também a intergração com seu Site, para começar a utilizar seu script do PluginZap é preciso adicionar apenas uma linha de código nas páginas em que você deseja receber mensagens, e te ajudamos a realizar essa integração com as principais plataformas de Sites:</p>
        <h2>Adicionar ao meu Site HTML</h2>
        <p>Para adicionar seu Script do PluginZap em um Site desenvolvido em HTML, você precisará abrir todos os arquivos em que deseja receber mensagens e adicionar seu Script de Integração no fim de cada página, antes do fechamento da tag <code><&#47;body></code>.</p>
        <h3>Exemplo</h3>
        <p>Se eu desejo adicionar em minha página inicial <code>index.html</code>, é necessário abrir a página com um editor de texto (Bloco de Notas, Sublime Text, NotePad++) e identificar a tag <code><&#47;body></code>, o código deverá ser adicionado uma linha antes dessa tag:</p>
        <div class="codeWindow">
            <span class="fileName">index.html</span>
            <code>
            &lt;html&gt;<br/>
            &lt;header&gt;<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;title&gt;Título da minha Página&lt;/title&gt;<br/>
            &lt;/header&gt;<br/>
            &lt;body&gt;<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Conteudo do meu Site em HTML&lt;/p&gt;<br/>
            <span class="destaq">//Insira o Script de Integração aqui</span><br/>
            &lt;/body&gt;<br/>
            &lt;/html&gt;<br/>
            </code>
        </div>
        <h2>Adicionar ao meu Site Wordpress</h2>
        <p>O PluginZap também pode ser adicionado ao seu Site Wordpress diretamente pelo seu Painel Administrativo, siga os passos abaixo para começar a receber mensagens:</p>
        <p>1 - Acesse seu Painel Administrativo, vá em <strong>Aparência</strong> no menu lateral esquerdo e depois em <strong>Editor de temas</strong>.</p>
        <img src="images/wordpress-editor-temas.jpg" alt="Adicionar Script de Integração Wordpress" title="Adicionar Script de Integração Wordpress">
        <p>2 - Na página de Editor de Temas, no menu lateral <strong>Arquivos do tema</strong>, selecione o arquivo <strong>Rodapé do tema (footer.php)</strong></p>
        <img src="images/wordpress-rodape.jpg" alt="Adicionar Script de Integração Wordpress" title="Adicionar Script de Integração Wordpress">
        <p>3 - em <strong>Conteúdo do arquivo selecionado:</strong> localize a tag <code>&lt;/body></code> e adicione seu Script de Integração na linha acima:</p>
        <img src="images/wordpress-inserir-script.jpg" alt="Adicionar Script de Integração Wordpress" title="Adicionar Script de Integração Wordpress">
        <p>Seu Script está pronto:</p>
        <img src="images/wordpress-script-pronto.jpg" alt="PluginZap Integrado ao Site" title="PluginZap Integrado ao Site">
        <h2>Adicionar ao meu Site Wix</h2>
        <p>Tamém é possível adicionar o PluginZap ao seu site Wix, para isso siga os passos abaixo:</p>
        <ol>
            <li>Acesse sua Conta no Wix.</li>
            <li>Vá em <strong>Configurações do Site</strong></li>
            <li>Cliqe em <strong>Análises</strong>.</li>
            <li>Clique na opção <strong>+ Nova Ferramenta</strong> e selecione a opção <strong>Personalizado</strong> no menu.</li>
            <li>Nova Ferramenta:
                <ul>
                    <li>Adicione o <strong>código personalizado</strong> (Cole seu código de Integração do PluginZap).</li>
                    <li>Selecione o domínio relevante. (Disponível apenas se houver mais de um domínio em sua conta Wix)</li>
                    <li>Adicione o nome do código personalizado (Insira PluginZap)</li>
                    <li>Adicionar código as páginas: (Escolha as opções abaixo)
                        <ul>
                            <li>Todas as Páginas.</li>
                            <li>Carregue o código em cada nova página.</li>
                        </ul>
                    </li>
                    <li>Coloque o código em: (Selecione a opção)
                        <ul>
                            <li>Body - fim</li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li>Clique em OK.</li>
        </ol>
        <p>Se durante o processo de integração você encontrar qualquer dificuldade, poderá sempre contar com nosso Suporte Técnico!</p>

        <div class="assine">
            <img src="images/pluginzap-join.png" alt="Ganhe 1 mês grátis">
            <h2>Ganhe 1 mês grátis para testar uma Ferramenta Completa!</h2>
            <a href="../join" class="btn-primary">Começar agora</a>
        </div>

        <h2>Você também pode se interessar por</h2>
    </div>
</article>
<footer>
    Copyright @ 2020 - Todos os Direitos Reservados - Agência Digital Wule
</footer>
