            </div>
        </div>
    </div>
    <footer class="fluid-container">
        <div class="container link-footer">
            <div>

            </div>
            <div class="links-map">
                <a href="#functionalities">Funcionalidades</a> <a href="#signature">Assinatura</a> <a href="#how-to">Integração</a> <a href="#support">Suporte</a> <a href="#">Login</a> <a href="#">Cadastre-se</a>
            </div>
        </div>
        <div class="container copyright">
            Copyright @ 2020 - Todos os Direitos Reservados - Agência Digital Wule
        </div>
    </footer>
    <div class="windowAll" id="assign">
        <a href="javascript:void(0)" class="closeAll">X</a>
        <div class="conteudoWindow">
            <h1>Assinatura</h1>
            <span id="trialExpiration"></span>
            <div class="hr"><span>Assinatura</span></div>
            <div class="table-overFlow">
                <table class="planDetails">
                    <tr>
                        <td>Plano</td>
                        <td>Valor</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td id="planTitle"></td>
                        <td id="planValue"></td>
                        <td id="planStatus"></td>
                    </tr>
                </table>
            </div>
            <p>
                Para alterações do plano, entre em contato com nosso suporte <strong>suporte@gerenciazap.com.br</strong>.
            </p><br>
            <div class="hr"><span>Cartão cadastrado</span></div>
            <div class="btn-cards">
                <a href="javascript:void(0)" class="btn-card creditCard active">•••• •••• <?=$User->getCreditCardCode();?></a>
                <!--<a href="javascript:void(0)" class="btn-card" id="addCardBtn">Alterar Cartão</a>-->
            </div>
            <div class="addCard">
                <label for="">
                    <span>CPF do Titular</span>
                    <input type="text" placeholder="000.000.000-00">
                </label>
                <label for="">
                    <span>Número do Cartão</span>
                    <input type="text" placeholder="0000 0000 0000 0000" class="creditCard">
                </label>
                <label for="">
                    <span>Nome Impresso no Cartão</span>
                    <input type="text" placeholder="Ex: PEDRO R. SILVA">
                </label>
                <label for="">
                    <span>Validade</span>
                    <input type="text" placeholder="Ex: 12/20">
                </label>
                <label for="">
                    <span>Código de Segurança (CVV)</span>
                    <input type="text" placeholder="Ex: 123" class="cvvCard">
                </label>
            </div>
            <p>O meio de pagamento será utilizado para ativação automática das assinaturas em seu cadastro a cada ciclo de utilização da aplicação.</p><br>
            <!--<p class="text-center"><button class="btn-primary">Salvar Dados</button></p>-->
        </div>
    </div>
    <div class="windowAll" id="profile">
        <a href="javascript:void(0)" class="closeAll">X</a>
        <div class="conteudoWindow">
            <h1>Meu Perfil</h1>
            <p><span id="userNome"></span></p>
            <p>E-mail: <strong><span id="userEmail"></span></strong></p><br>
            <div class="hr"><span>Alterar sua Senha</span></div>
            <form action="javascript:changePassword()" id="changePass">
                <label for="oldPassword">
                    <span>Senha Atual</span>
                    <input type="password" name="oldPassword" id="oldPassword" placeholder="Senha Atual" required>
                </label>
                <label for="newPassword">
                    <span>Nova Senha</span>
                    <input type="password" id="newPassword" name="newPassword" placeholder="Nova Senha" required>
                </label>
                <label for="confirmPassword">
                    <span>Confirme a nova Senha</span>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirme a nova Senha" required>
                </label>
                <p class="text-center"><button class="btn-primary" id="savePassChange">Salvar</button></p>
            </form>
        </div>
    </div>
    <script src="source/js/croppie.js"></script>
    <script src="source/js/script.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-019V70SFVV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-019V70SFVV');
    </script>
</body>
</html>