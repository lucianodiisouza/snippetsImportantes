<?php 
// adicionar ao functions.php 
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login
    
    function my_front_end_login_fail( $username ) {
       $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
       // if there's a valid referrer, and it's not the default log-in screen
       if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
          exit;
       }
    }
?>
<style>
    .uf {
        height: 400px !important;
    }
    .capture-form {
    height: 200px !important;
    }
    #sombra {
        z-index: 999;
        display: none;
        padding-top: 100px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4)
    }

    #caixa {
        margin: 7.5px auto;
        width: 350px;
        height: 500px;
        background-color: #F8FFFE;
        border-radius: 5px !important;
    }

    #sombraValidate {
        z-index: 999;
        display: none;
        padding-top: 100px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4)
    }

    #caixaValidate {
        margin: 7.5px auto;
        width: 350px;
        height: 410px;
        background-color: #F8FFFE;
        border-radius: 5px !important;
    }

    #sombraRecover {
        z-index: 999;
        display: none;
        padding-top: 100px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4)
    }

    #caixaRecover {
        margin: 7.5px auto;
        width: 350px;
        height: 400px;
        background-color: #F8FFFE;
        border-radius: 5px !important;
    }

    #divLoginBoxB {
        width: 350px;
        height: 450px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #rec_senhaB {
        width: 350px;
        height: 500px !important;
        display: none;
        flex-direction: column;
        align-items: center;
    }

    #divLoginBoxB #loginform {
        width: 330px !important;
        height: 400px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: auto auto;
    }

    #lembrarB,
    .login-rememberB p {
        font-size: 10px !important;
    }

    #inputFormUsuario,
    #inputFormSenha,
    .um-button,
    #um-submit-btn {
        width: 270px !important;
        height: 35px !important;
        align-self: center;
    }

    #lost_passwordB {
        color: red;
    }

    #link-box-formB,
    #link-box-form-cadB {
        width: 280px;
        height: 40px !important;
        display: flex !important;
        flex-direction: row;
        justify-content: center;
        margin: 0 auto !important;
        margin-top: -30px !important;
    }

    #link-box-recB {
        width: 280px;
        height: 40px !important;
        display: flex !important;
        flex-direction: row;
        justify-content: center;
        margin: 0 auto !important;
    }

    #link-box-recB #um-submit-btn {
        margin: 0 auto !important;
    }


    .esqueci-senhaB {
        font-size: 11px !important;
        color: black;
        cursor: pointer;
    }

    .cad-formB {
        width: 330px;
        height: 600px !important;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .cad-formB #um-submit-btn {
        margin-bottom: 5px !important;
    }

    #um-submit-btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .recuperarB um-password {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .cad-formB .um-row-heading {
        margin-top: -10px;
    }

    .cad-formB .um-col-1 {
        margin: 0 auto;
        margin-top: -35px !important;
    }

    .cad-formB um-register {
        margin-top: -10px;
    }

    .cad-formB input,
    .recuperarB input,
    .um-col-1,
    .um-field-area,
    .um-field-block {
        width: 270px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
    }

    #alertB {
        display: none;
        font-size: 12px;
        font-weight: bold;
        width: 270px;
        color: red;
        margin: 0 auto;
        text-align: center;
    }
    #invalido {
        display: none;
        font-size: 12px;
        font-weight: bold;
        width: 270px;
        color: red;
        margin: 0 auto;
        text-align: center;
    }
    #wrongCredentials {
        display: none;
        font-size: 12px;
        font-weight: bold;
        width: 270px;
        color: red;
        margin: 0 auto;
        text-align: center;
    }
    #vazio {
        display: none;
        font-size: 12px;
        font-weight: bold;
        width: 270px;
        color: red;
        margin: 0 auto;
        text-align: center;
    }
    #valido {
        display: none;
        font-size: 12px;
        font-weight: bold;
        width: 270px;
        color: green;
        margin: 0 auto;
        text-align: center;
    }
    /* Modal Pós Cadastro */
    .btnFecharModal {
        width: 48px;
        height: 48px;
        float: right;
        margin: 0 auto;
    }

    #validate {
        width: 100%;
        height: 400px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #validate p {
        width: 270px;
        margin-top: 15px;
        text-align: justify;
    }

    .validateCorrect {
        width: 128px;
        height: 128px;
    }

    .mega-indicator {
        display: none !important;
    }
</style>
<!-- daqui pra cima é no Head, daqui pra baixo é no footer -->
<div id="sombra">
    <div id="caixa">
        <img src="http://stillblog.com.br/wp-content/uploads/2019/11/close-window.png" alt="Fechar janela"
            onclick="fecharModal('sombra')" class="btnFecharModal">
        <!-- inicio -->
        <div id="divLoginBoxB">
            <div id="invalido">Email não cadastrado.</div>
            <div id="valido">Email válido!</div>
            <div id="vazio">Preencha todo o formulário!</div>
            <div id="wrongCredentials">Você digitou uma senha inválida!</div>
            [wp_login_form
            placeholder_username="Seu email..."
            placeholder_password="Sua senha..."
            label_username="Email"
            label_password="Senha"
            label_log_in="Entrar"
            id_username="inputFormUsuario"
            id_password="inputFormSenha"
            id_remember="lembrar"
            lost_password="0"
            redirect="http://www.stillblog.com.br"
            ]

            <div id="link-box-formB">
                <div class="esqueci-senhaB" onclick="recuperaSenhaB()">
                    Esqueci minha senha
                </div>
                <p class="esqueci-senhaB">  |  </p>
                <div class="esqueci-senhaB" onclick="mostraCadastroB()">
                    Cadastre-se
                </div>
            </div>
        </div>
        <div class="cad-formB" id="form_cadastroB">
            <div id="alertB">Seu email precisa ser Institucional</div>
            [ultimatemember form_id="1252"]
            <div id="link-box-form-cadB">
                <div class="esqueci-senhaB" onclick="recuperaSenhaB()">
                    Esqueci minha senha
                </div>
                <p class="esqueci-senhaB">  |  </p>
                <div class="esqueci-senhaB" onclick="mostraLoginB()">
                    Fazer login
                </div>
            </div>
        </div>
        <div id="rec_senhaB" class="recuperarB">
            [ultimatemember_password]
            <div id="link-box-recB">
                <div class="esqueci-senhaB" onclick="mostraLoginB()">
                    Fazer login
                </div>
                <p class="esqueci-senhaB">  |  </p>
                <div class="esqueci-senhaB" onclick="mostraCadastroB()">
                    Cadastre-se
                </div>
            </div>
        </div>
        <!-- fim -->
    </div>
</div>
<div id="sombraValidate">
    <div id="caixaValidate">
        <img src="http://stillblog.com.br/wp-content/uploads/2019/11/close-window.png" alt="Fechar janela"
            onclick="fecharModal('sombraValidate')" class="btnFecharModal">
        <div id="validate">
            <img src="http://stillblog.com.br/wp-content/uploads/2019/11/correct.png" alt="Tudo certo!"
                class="validateCorrect">
            <p>Obrigado por se cadastrar no StillBlog. Todos os novos usuários passam pela moderação de um
                administrador. Em breve entraremos em contato validando seu cadastro.</p>
        </div>
    </div>
</div>
<div id="sombraRecover">
    <div id="caixaRecover">
        <img src="http://stillblog.com.br/wp-content/uploads/2019/11/close-window.png" alt="Fechar janela"
            onclick="fecharModal('sombraRecover')" class="btnFecharModal">
        <div id="validate">
            <img src="http://stillblog.com.br/wp-content/uploads/2019/11/correct.png" alt="Tudo certo!"
                class="validateCorrect">
            <p>Recebemos sua solicitação de redefinição de senha! Enviamos um link para o email cadastrado, cheque sua
                caixa de mensagens.</p>
        </div>
    </div>
</div>
<!--
        Funçoes Luciano / 27-11-2019 
        Essas modificações foram movidas para temas/epico/index.php
    -->
<script>
    var a = document.getElementById("form_cadastroB");
    var b = document.getElementById("divLoginBoxB");
    var c = document.getElementById("rec_senhaB");

    // Aleatoriedades Declarativas
    document.getElementById("user_email-1252").addEventListener("blur", validaEmailB);
    document.getElementById("mega-menu-item-1241").addEventListener("click", mostrarModal);
    document.getElementById("inputFormUsuario").addEventListener("blur", checkMail);
    document.getElementById("inputFormUsuario").required = true;
    document.getElementById("inputFormSenha").required = true;

    function validaEmailB() {
        var email = document.getElementById("user_email-1252").value;
        var array = email.split("@", 2);
        var mails = [
            "gmail.com",
            "bol.com.br",
            "globo.com",
            "hotmail.com",
            "ig.com.br",
            "live.com",
            "mailinator.com",
            "msn.com",
            "outlook.com",
            "terra.com.br",
            "uol.com.br",
            "yahoo.com.br",
            "yahoo.com",
            "abcdistribuidorapanfletos.com.br",
            "aedistribuidoradefolhetos.com.br",
            "aliancadistribuicao.com.br",
            "classeapanfletos.com.br",
            "distribuidoradefolhetos.com.br",
            "gwlog.com.br",
            "inovardistribuidora.com.br",
            "lvdistribuidora.com.br",
            "omxexpress.com.br",
            "portal12.com.br",
            "rkdistribuicao.com.br",
            "semfronteiraspublicidade.com.br",
            "adplanejada.com"
        ];

        var consulta = mails.includes(array[1]);
        if (consulta == true) {
            document.getElementById("user_email-1252").style.backgroundColor = "red";
            document.getElementById("user_email-1252").style.color = "white";
            document.getElementById("um-submit-btn").disabled = "true";
            document.getElementById("alertB").style.display = 'block';
            console.log("Esse email ai não pode não BRO!");
        } else {
            document.getElementById("user_email-1252").style.backgroundColor = "white";
            document.getElementById("user_email-1252").style.color = "black";
            document.getElementById("um-submit-btn").disabled = false;
            document.getElementById("alertB").style.display = "none";
            console.log("Vem tranquilo, se afoba não!");
        }
        return array;
    }

    function checkMail() {
        var mail = document.getElementById("inputFormUsuario").value;
        var senha = document.getElementById("inputFormSenha").value;
        var indice = phpmails.length - 1;
        while (indice > 0) {
            var user_emails = phpmails[indice].user_email;
            var login = '"user_email":"' + user_emails;
            var verifica = login.includes(mail);
            document.getElementById("vazio").style.display = 'none';
            if (verifica == true) {
                if (mail === "") {
                    console.log("vazio");
                    document.getElementById("vazio").style.display = 'block';
                    document.getElementById("wp-submit").disabled = true;
                    document.getElementById("valido").style.display = 'none';
                    document.getElementById("invalido").style.display = 'none';
                    break;
                } else {
                    console.log("prenchido");
                    document.getElementById("vazio").style.display = 'none';
                    document.getElementById("wp-submit").disabled = false;
                }
                document.getElementById("valido").style.display = 'block';
                document.getElementById("invalido").style.display = 'none';
                document.getElementById("inputFormUsuario").style.borderColor = "green";
                document.getElementById("wp-submit").disabled = false;
                console.log(indice);
                break;
            } else {
                document.getElementById("valido").style.display = 'none';
                document.getElementById("invalido").style.display = 'block';
                document.getElementById("inputFormUsuario").style.borderColor = "red";
                document.getElementById("wp-submit").disabled = true;
                indice = indice - 1;
            }
        }
    }

    function mostraCadastroB() {
        a.style.display = "flex";
        b.style.display = "none";
        c.style.display = "none";
        document.getElementById("caixa").style.height = "600px";
        document.getElementById("link-box-form-cadB").style.marginTop = "-10px !important";
        window.history.pushState('page2', 'Title', '/?validate=true');
        document.getElementById("redirect_to").value = "?validate=true";
        console.log("Cadastrar usuário");
    }

    function mostraLoginB() {
        a.style.display = "none";
        b.style.display = "flex";
        c.style.display = "none";
        document.getElementById("caixa").style.height = "500px";
        console.log("Fazer login");
        window.history.pushState('page2', 'Title', '/');
        document.getElementById("redirect_to").value = "http://www.stillblog.com.br";
    }

    function recuperaSenhaB() {
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "flex";
        document.getElementById("caixa").style.height = "400px";
        window.history.pushState('page2', 'Title', '/?passwordRecovery=true');
        document.getElementById("redirect_to").value = "?passwordRecovery=true";
        console.log("Recuperar senha");
    }
    function mostrarModal() {
        document.getElementById('sombra').style.display = 'block';
        console.log('exibirModal');
    }

    function fecharModal(id) {
        document.getElementById(id).style.display = 'none';
        window.history.pushState('page2', 'Title', '/');
        document.getElementById("redirect_to").value = "";
        console.log("fecharModal");
    }


</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116098813-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-116098813-1');
</script>
