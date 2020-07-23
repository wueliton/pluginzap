<?php
$title = "Vamos começar";
$cssFiles = "source/css/getstart.css";
include("includes/head.php");
$pay = new \Includes\Payment\Payment; ?>
<body>
    <?php
    if(!empty($_GET)) {
        $codeVerification = new Includes\Verification\Code(array_key_first($_GET));
        $case = $codeVerification->validateKey();

        if($case == 1 || $case == 2 || $case == 3) {
        ?>
    <div class="fluid-container header">
        <img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo">
    </div>
    <div class="container tabs">
        <div <?php if($case==1) {echo 'class="active"';} ?>>
            <h1>Vamos começar</h1>
            <h2>Dados de Login</h2>
            <form action="javascript:validatePersonalData();" id="personalData">
                <div class="passwordRg">
                    <div>
                        <p>E-mail de login: <strong><?=$codeVerification->getEmail();?></strong></p>
                    </div>
                    <div>
                        <label for="cpf">
                            <span>* CPF</span>
                            <input type="text" name="cpf" placeholder="Seu CPF" id="cpf" class="maskCPF" required>
                        </label>
                    </div>
                    <div>
                        <label for="senha">
                            <span>* Senha</span>
                            <input type="password" name="password" placeholder="Sua Senha" id="senha" required>
                        </label>
                    </div>
                </div>
                <p class="text-center">
                    <input type="text" name="email" value="<?=$codeVerification->getEmail();?>" hidden>
                    <input type="text" name="celular" value="<?=$codeVerification->getEmail();?>" hidden>
                    <p class="text-right"><button class="btn-primary" type="submit" id="btnPersonalData">Próximo</button></p>
                </p>
            </form>
        </div>
        
        <div <?php if($case==2) {echo 'class="active"';} ?>>
            <h2>Dados de sua Empresa</h2>
            <form action="javascript:validateEnterpriseData()" id="uploadForm">
                <div class="profileInfo">
                    <div>
                        <div class="preview-pane">
                            
                        </div>
                        <input type="file" id="profilePicture" required hidden>
                        <a href="javascript:void(0)" class="sendPic">Enviar Logo</a><br/><br/>
                    </div>
                    <div>
                        <label for="site"><span>* Adicione seu Site</span>
                            <input type="text" name="site" placeholder="https://www.exemplo.com.br" id="site" required>
                        </label>
                        <label for="empresa"><span>* Nome da sua Empresa</span>
                            <input type="text" name="empresa" placeholder="Minha Empresa" id="empresa" required>
                        </label>
                        <label for="whatsapp"><span>* WhatsApp do Site</span>
                            <input type="text" name="whatsapp" placeholder="(19) 00000-0000" id="whatsapp" class="maskWhatsApp" required>
                        </label>
                        <input type="text" name="idClient" value="<?=$codeVerification->getId();?>" hidden>
                    </div>
                </div>
                <p class="text-right">
                    <button class="btn-primary" id="saveEnterpriseData">Escolher Plano</button>
                </p>
            </form>
        </div>
    </div>
    <div class="windowAll <?php if($case==3) {echo "active";} ?>" id="plan">
        <div class="conteudoWindow">
            <h1>Plano</h1>
            <p>Escolha seu plano:</p>
            <div class="plans">
                <div>
                    <h1>Iniciante</h1>
                    <h2>1 Site</h2>
                    <p>Desejo instalar somente em um Site.</p>
                    <h2>R$15,90</h2>
                    <span>Mensais</span>
                    <a href="javascript:choosePlan(1)" class="btn-primary">Escolher Plano</a>
                </div>
                <div class="scale">
                    <h1>Pro</h1>
                    <h2>3 Sites</h2>
                    <p>Possuo 3 sites e desejo instalar em todos.</p>
                    <h2>R$39,99</h2>
                    <span>Mensais</span>
                    <a href="javascript:choosePlan(2)" class="btn-primary">Escolher Plano</a>
                </div>
                <div>
                    <h1>Enterprise</h1>
                    <h2>10 Sites</h2>
                    <p>Possuo 10 sites e desejo instalar em todos.</p>
                    <h2>R$69,99</h2>
                    <span>Mensais</span>
                    <a href="javascript:choosePlan(3)" class="btn-primary">Escolher Plano</a>
                </div>
            </div>
        </div>
    </div>
    <div class="windowAll" id="payment">
        <div class="conteudoWindow">
            <h1>Pagamento</h1>
            <div class="hr"><span>Dados do Cartão de Crédito</span></div>
            <form action="javascript:payForm();" id="payForm">
                <div class="addCard">
                    <div class="twoColumns">
                        <label for="cpfTitular">
                            <span>CPF do Titular</span>
                            <input type="text" name="cpf" id="cpfTitular" placeholder="000.000.000-00" class="maskCPF" required>
                        </label>
                        <label for="dataDeNascimento">
                            <span>Data de Nascimento Titular</span>
                            <input type="text" name="dataDeNascimento" id="dataDeNascimento" placeholder="00/00/00000" class="bornDate" required>
                        </label>
                    </div>
                    <label for="numeroCartao">
                        <span>Número do Cartão</span>
                        <input type="text" name="numeroCartao" id="numeroCartao" placeholder="0000 0000 0000 0000" class="creditCard creditCardMask" required>
                    </label>
                    <label for="nome">
                        <span>Nome Impresso no Cartão</span>
                        <input type="text" name="nome" id="nome" placeholder="Ex: PEDRO R. SILVA" required>
                    </label>
                    <div class="twoColumns">
                        <label for="vencimento">
                            <span>Validade</span>
                            <input type="text" name="vencimento" id="vencimento" placeholder="Ex: 12/20" class="expirateCard" required>
                        </label>
                        <label for="cvv">
                            <span>Código de Segurança (CVV)</span>
                            <input type="text" name="cvv" id="cvv" placeholder="Ex: 123" class="cvvCard" required>
                        </label>
                    </div>
                </div>
                <div class="hr"><span>Endereço de Cobrança</span></div>
                <div class="clientData">
                    <label for="logradouro">
                        <span>Rua, nº</span>
                        <input type="text" name="logradouro" id="logradouro" placeholder="Endereço, Nº" required>
                    </label>
                    <div class="twoColumns">
                        <label for="bairro">
                            <span>Bairro</span>
                            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
                        </label>
                        <label for="cidade">
                            <span>Cidade</span>
                            <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                        </label>
                    </div>
                    <div class="twoColumns">
                        <label for="estado">
                            <span>Estado</span>
                            <input type="text" name="estado" id="estado" placeholder="SP" maxlength="2" required>
                        </label>
                        <label for="cep">
                            <span>CEP</span>
                            <input type="text" name="cep" id="cep" placeholder="00000-000" class="cepMask" required>
                        </label>
                    </div>
                </div>
                <input type="text" name="token" hidden>
                <input type="text" name="cardBrand" hidden>
                <input type="text" name="pais" placeholder="País" value="BRA" hidden>
                <input type="text" name="planCode" hidden>
                <input type="text" name="email" value="<?=$codeVerification->getEmail();?>" hidden>
                <input type="text" name="celular" value="<?=$codeVerification->getWhatsApp();?>" hidden>
                <input type="text" name="idClient" value="<?=$codeVerification->getId();?>" hidden>
                <p class="text-right"><button type="submit" class="btn-primary" id="startUse">Começar</button></p>
                <div class="why">
                    <p class="aviso">Porque estamos solicitando os dados de Pagamento?</p>
                    <p>Você poderá utilizar a ferramenta pelo período de 30 dias de forma gratuita, mas, para garantir a continuidade do serviço, solicitamos os dados de pagamento, porém, você poderá realizar o cancelamento do serviço a qualquer momento nesse período de teste sem nenhuma cobrança.</p>
                </div>
            </form>
        </div>
    </div>
    <footer class="fluid-container">
        <div class="container copyright">
            Copyright @ 2020 - Todos os Direitos Reservados - Agência Digital Wule
        </div>
    </footer>
        <?php
        }
        else if($case == 4) {
            ?>
    <div class="fluid-container header">
        <img src="source/images/logo.png" alt="GerenciaZap" title="GerenciaZap" class="logo">
    </div>
    <div class="container">
        <h1>Link Expirado</h1>
        <p>O link utilizado <strong>Expirou</strong>, solicite um novo link preenchendo o formulário abaixo:</p><br/>
        <form action="javascript:newVerificationCode()" id="newVerificationCode">
            <label for="emailNewToken">
            <span>Email de cadastro</span>
            <input type="email" name="emailNewToken" id="emailNewToken" required>
            </label>
            <input type="text" name="tokenValidate" value="<?=$fullkey?>" hidden>
            <p class="text-right"><button class="btn-primary" id="newTokenBtn">Solicitar novo Código</button></p>
        </form>
    </div>
    <div class="windowAll" id="emailConfirm">
        <div class="conteudoWindow">
            <h1>Confirme sua conta</h1>
            <p>Enviamos um e-mail para <strong id="emailAccount">{email}</strong>, clique no botão de confirmar sua conta para finalizar o seu cadastro.</p>
            <span class="aviso">O código de confirmação é válido por até 3 horas.</span>
        </div>
    </div>
            <?php
        }
        else {
            header('Location: login');
        }

        if($case == 1 || $case == 2 || $case == 3 || $case == 4) {
            ?>
    <script src="source/js/script.js"></script>
    <script src="source/js/croppie.js"></script>
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        PagSeguroDirectPayment.setSessionId('<?= $pay->getSessionId(); ?>');
    </script>
            <?php
        }
    }
    else {
        header('Location: index');
    }
?>
</body>
</html>