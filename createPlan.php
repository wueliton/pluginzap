<?php
require("includes/autoload.php");
$pay = new \Includes\Payment\Payment;
$pay->createPlan(2, "Inicial", "MONTHLY", '15.90', 30);
$pay->getCallback(0);
?>
<html>
<body>
<form action="javascript:payForm()" id="payForm">
    <input type="text" name="nome" placeholder="Nome Impresso no Cartão" /><br/>
    <input type="text" name="dataDeNascimento" placeholder="Data de Nascimento Titular" class="bornDate">
    <input type="text" name="cpf" placeholder="CPF do titular" class="maskCPF" /><br/>
    <input type="text" name="celular" placeholder="Celular" class="maskWhatsApp"><br/>
    <input type="text" name="email" placeholder="E-mail"><br/>
    <input type="text" name="logradouro" placeholder="Logradouro"><br/>
    <input type="text" name="numero" placeholder="Número"><br/>
    <input type="text" name="complemento" placeholder="Complemento"><br/>
    <input type="text" name="bairro" placeholder="Bairro"><br/>
    <input type="text" name="cidade" placeholder="Cidade"><br/>
    <input type="text" name="estado" placeholder="Estado"><br/>
    <input type="text" name="pais" placeholder="País" value="BRA" hidden>
    <input type="text" name="cep" placeholder="CEP" class="cepMask"><br/>
    <input type="text" name="token" hidden>
    <input type="text" name="cardBrand" hidden>
    <input type="text" name="numeroCartao" placeholder="Número do Cartão" class="creditCard"><br/>
    <input type="text" name="vencimento" placeholder="MM/AA" class="expirateCard"><br/>
    <input type="text" name="cvv" placeholder="CVV"><br/>
    <input type="text" name="planCode" value="1651A7395E5EB61EE472BFB7A7988BD4" hidden>
    <button type="submit">Salvar</button>
</form>

<script src="source/js/script.js"></script>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
PagSeguroDirectPayment.setSessionId('<?= $pay->getSessionId(); ?>');

$("input[name=numeroCartao]").keyup(function() {
    cardNumber = $("input[name=numeroCartao]").val();
    cardNumber = cardNumber.replace(/[^0-9.]/g,"");

    if(cardNumber.length > 6) {
        PagSeguroDirectPayment.getBrand({
            cardBin: cardNumber,
            success: function(response) {
                console.log(response);
                $("input[name=cardBrand]").val(response.brand.name);
            },
            error: function(response) {

            }
        });
    }
})

</script>
</body>
</html>