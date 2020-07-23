<?php
$title = "Problema com sua Assinatura";
$cssFiles = "source/css/panel.css";
$page = "panel";
include("includes/head-panel.php");
$pay = new \Includes\Payment\Payment;
?>
    <?php include("includes/panel-navbar.php"); ?>
    <div class="container signatureError">
            <h1>Problema com sua Assinatura</h1>
            <p class="aviso">Houve um problema no processamento do pagamento de renovação da sua conta no <strong>PluginZap</strong>.</p>
            <p>Para continuar utilizando seu serviço normalmente, é necessário confirmar ou alterar os dados do Cartão de Crédito atualmente utilizado para renovação.</p><br/>
            <div class="hr"><span>Dados do Cartão de Crédito</span></div>
            <form action="javascript:activateSignature();" id="activateSignature">
                <input type="text" value="<?=$_SESSION['id_usuario']?>" name="userId" hidden>
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
                <p class="text-right"><button id="paymentBtn">Atualizar Pagamento</button></p>
            </form>
    </div>
    <?php include("includes/panel-footer.php"); ?>
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        PagSeguroDirectPayment.setSessionId('<?= $pay->getSessionId(); ?>');
    </script>
</body>
</html>