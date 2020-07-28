<?php 

date_default_timezone_set('America/Sao_Paulo');

require "../includes/autoload.php";

if(isset($_GET["code"])) {
    $fullCode = $_GET["code"];
    $code = base64_decode($_GET["code"]);
    $code = explode("|",$code);
    $theme = str_replace("Tema:","",$code[0]);
    $idEnterprise = str_replace("IdEnterprise:","",$code[1]);
    $urlSite = "https://www.pluginzap.com/application/send.php";

    $enterpriseData = new Includes\Enterprises\Enterprise();
    $data = $enterpriseData->getEnterpriseDataApplication($idEnterprise);
    $mensagem = $data[0]['mensagem'];
    $mensagem = preg_replace("/([\n\r]+|[\s]{2,})/", "", nl2br($mensagem));
?>
urlBase = "https://www.pluginzap.com/uploads/";
url_atual = window.location.href;
domain = "<?=$data[0]['site']?>";
domain = domain.replace("http://","");
domain = domain.replace("https://","");
n = url_atual.search(domain);

if(n == -1) {

}
else {

<?php

    if($data[0]['btn_template'] == 1) {
?>
id = "<?php echo $fullCode;?>";
empresa = "<?php echo $data[0]['nome'];?>";
image = urlBase+"<?php echo $data[0]['imagem'];?>";
mensagem = "<?=$mensagem?>";
css = '.wtsIcon{position:fixed;z-index:999999999;right:30px;bottom:30px}.wtsIcon img{max-height:60px}.wtsIcon .notificationWTS{position:absolute;height:12px;width:12px;border-radius:50%;background:red;color:#fff;font-size:10px;text-align:center;font-weight:700;font-style:normal;margin-left:3px;margin-top:3px;font-family:sans-serif}.windowWTS{z-index:999999999;font-family:sans-serif;position:fixed;right:30px;bottom:110px;border-radius:10px;box-shadow:0 20px 30px -15px #ccc;font-smooth:always}.windowWTS header{background:#095e54;display:flex;flex-direction:row;border-radius:10px 10px 0 0;color:#fff}.windowWTS header .profileWTS{box-sizing: content-box;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;width:50px;height:50px;padding:15px}.profileWTS img{display:block;height:50px;width:50px;border-radius:50%;background:#fff}.profileWTS .onlineWTS{position:absolute;height:6px;width:6px;background:#14c656;border-radius:50%;margin-left:36px;margin-top:-10px;border:2px solid #095e54}.windowWTS header .infoWTS{display:flex;align-items:center}.infoWTS span{font-size:13px;display:block;margin-top:5px}.windowWTS .containerWTS{padding:20px;background:url(../img/bg-wts.jpg) #e5dcd5 no-repeat;background-size:cover}#chatWTS{position:relative;z-index:2}.msgWTS{padding:15px 15px 5px 15px;border-radius:0 9px 9px 9px;box-shadow:0 2px 4px #aaa;display:inline-block;background:#fff}.msgWTS:before{content:"";position:absolute;border-top:0 solid transparent;border-bottom:10px solid transparent;border-right:10px solid #fff;margin-left:-22px;margin-top:-15px}.msgWTS .nameWTS{color:#aaa;font-size:13px}.msgWTS .messageWTS{padding:5px 0;margin:0;font-size:15px}.msgWTS .timeWTS{margin-top:5px;color:#aaa;font-size:12px;display:block;text-align:right;margin-right:-8px}.sendWTS{padding:15px;background:#fff;border-radius:0 0 10px 10px}.sendWTS .buttonWTS{padding:10px 15px;display:block;background:#14c656;color:#fff;border-radius:20px;text-align:center;text-decoration:none;font-size:15px;transition:all .5s}.sendWTS .buttonWTS:hover{background:#47e481}.sendWTS .buttonWTS img{height:15px;margin-right:5px;margin-bottom:-2px}.formWTS{background:#e2e2e2;border-radius:10px;padding:20px 15px;position:absolute;height:100%;display:flex;align-items:center;z-index:1;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.formWTS input[type=email],.formWTS input[type=tel],.formWTS input[type=text]{padding:10px 15px;border:0;border-radius:25px;outline:0;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.formWTS input+input{margin-top:5px}.formWTS textarea{padding:10px 15px;border:0;border-radius:15px;outline:0;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-top:5px;font-family:sans-serif;resize:none}.formWTS input[type=submit]{margin-top:15px;padding:10px 15px;display:block;background:#14c656;color:#fff;border-radius:20px;text-align:center;text-decoration:none;font-size:15px;transition:background .5s;border:0;outline:0;cursor:pointer}.formWTS input[type=submit]:hover{background:#47e481}.fadeOut{animation:easyOut .5s forwards}@keyframes easyOut{from{display:block;opacity:1}to{display:none;opacity:0;position:relative;z-index:-1}}@media (min-width:451px){.windowWTS{animation:showWindow .5s forwards;animation-delay:2s;max-height:0;overflow:hidden}.visibility{display:none}}@media (max-width:450px){.wtsIcon{right:20px}.windowWTS{right:10px;width:calc(100% - 20px);}.windowWTS #chatWTS{z-index:2}.visibility{display:none}}@keyframes showWindow{from{width:0;max-height:0;opacity:0}to{width:300px;max-height:400px;opacity:1;overflow:auto}}';
head = document.head || document.getElementsByTagName('head')[0];
style = document.createElement('style');
head.appendChild(style);
style.type = 'text/css';
if (style.styleSheet){
    style.styleSheet.cssText = css;
} else {
    style.appendChild(document.createTextNode(css));
}

document.body.innerHTML += '<div id="'+id+'"></div>';
document.querySelector("#"+id).innerHTML='<a href="javascript:void(0)" class="wtsIcon"> <i class="notificationWTS">1</i> <img src="'+urlBase+'/whatsapp.svg" alt="WhatsApp"> </a> <div class="windowWTS visibility"> <div class="formWTS"> <form action="<?=$urlSite?>" id="WTSForm" method="post" target="_blank"><input type="text" name="url" value="'+url_atual+'" hidden /><input type="hidden" name="idEnterprise" value="<?=$idEnterprise?>" /> <input type="text" name="name" placeholder="Nome" required> <input type="tel" name="whatsapp" placeholder="DDD + Número" required> <input type="email" name="mail" placeholder="E-mail" required> <textarea name="message" rows="3" placeholder="Sua Mensagem" required></textarea> <input type="submit" value="Enviar"> </form> </div><div id="chatWTS"> <header> <div class="profileWTS"><img src="'+image+'" alt="'+empresa+'"><i class="onlineWTS"></i></div><div class="infoWTS"><div>'+empresa+'<span>online</span></div></div></header> <div class="containerWTS"> <div class="msgWTS"><span class="nameWTS"><strong>'+empresa+'</strong></span><p class="messageWTS">'+mensagem+'</p><span class="timeWTS"><?php echo date('H:i') ?></span></div></div><div class="sendWTS"> <a href="#" class="buttonWTS"><img src="'+urlBase+'/send.svg" alt="Enviar"> Enviar Mensagem</a> </div></div></div>';

bemVindo = setTimeout(function() {
    document.querySelector(".windowWTS").classList.toggle('visibility');
},2000);
document.querySelector(".buttonWTS").onclick = function() {
    document.querySelector("#chatWTS").classList.add("fadeOut");
    document.querySelector(".formWTS input[name='name']").focus();
}
document.querySelector(".wtsIcon").onclick = function() {
    clearTimeout(bemVindo);
    document.querySelector(".windowWTS").classList.toggle('visibility');
    document.querySelector(".windowWTS").style.animationDelay="0s";
}
document.querySelector("#WTSForm").addEventListener("submit",function(e) {
	e.preventDefault();
	document.querySelector("#WTSForm").submit();
})

<?php
    }
    else if($data[0]['btn_template'] == 2) {
?>
id = "<?php echo $fullCode;?>";
empresa = "<?php echo $data[0]['nome'];?>";
image = urlBase+"<?php echo $data[0]['imagem'];?>";
css = '.wtsIcon{position:fixed;z-index:999999999;right:30px;bottom:30px;text-decoration:none}.wtsIcon img{max-height:60px}.wtsIcon .notificationWTS{position:absolute;height:12px;width:12px;border-radius:50%;background:red;color:#fff;font-size:10px;text-align:center;font-weight:700;font-style:normal;margin-left:3px;margin-top:3px;font-family:sans-serif}.wtsIcon .textNtWTS{font-family:sans-serif;background:#14c656;color:#fff;padding:10px 15px;border-radius:20px;font-size:13px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;width:162px;margin-left:-180px;margin-top:10px}.wtsIcon .textNtWTS:before{content:"";position:absolute;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:10px solid #14c656;margin-left:145px;margin-top:3px}.windowWTS{z-index:999999999;position:fixed;left:0;top:0;background:rgb(0,0,0,.3);height:100vh;width:100vw;display:flex;flex-direction:row;justify-content:center;align-items:center;font-family:sans-serif;display:none}.visibility{display:block;display:flex}.closeWTS{position:absolute;font-style:normal;margin-left:240px;margin-top:15px;font-family:sans-serif;padding:10px;cursor:pointer;color:#ddd}.closeWTS:hover{color:#fff}.windowWTS .formWTS{background:#fff;display:flex;flex-direction:column;border-radius:10px;background:#e2e2e2;min-width:280px}.windowWTS form{padding:15px}.windowWTS header{background:#095e54;display:flex;flex-direction:row;border-radius:10px 10px 0 0;color:#fff}.windowWTS header .profileWTS{box-sizing: content-box;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;width:50px;height:50px;padding:15px}.profileWTS img{display:block;height:50px;width:50px;border-radius:50%;background:#fff}.profileWTS .onlineWTS{position:absolute;height:6px;width:6px;background:#14c656;border-radius:50%;margin-left:36px;margin-top:-10px;border:2px solid #095e54}.windowWTS header .infoWTS{display:flex;align-items:center}.infoWTS span{font-size:13px;display:block;margin-top:5px}.windowWTS .formWTS input{display:block}.formWTS input[type=email],.formWTS input[type=tel],.formWTS input[type=text]{padding:10px 15px;border:0;border-radius:25px;outline:0;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.formWTS input+input{margin-top:5px}.formWTS textarea{padding:10px 15px;border:0;border-radius:15px;outline:0;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-top:5px;font-family:sans-serif;resize:none}.formWTS input[type=submit]{margin-top:15px;padding:10px 15px;display:block;background:#14c656;color:#fff;border-radius:20px;text-align:center;text-decoration:none;font-size:15px;transition:background .5s;border:0;outline:0;cursor:pointer}.formWTS input[type=submit]:hover{background:#47e481}';
head = document.head || document.getElementsByTagName('head')[0];
style = document.createElement('style');
head.appendChild(style);
style.type = 'text/css';
if (style.styleSheet){
    style.styleSheet.cssText = css;
} else {
    style.appendChild(document.createTextNode(css));
}


document.body.innerHTML += '<div id="'+id+'"></div>';
document.querySelector("#"+id).innerHTML='<a href="javascript:void(0)" class="wtsIcon"> <span class="textNtWTS">Chamar no WhatsApp!</span> <i class="notificationWTS">1</i> <img src="'+urlBase+'whatsapp.svg" alt="WhatsApp"> </a> <div class="windowWTS"> <div class="formWTS"> <header> <i class="closeWTS">x</i> <div class="profileWTS"><img src="'+image+'" alt=""><i class="onlineWTS"></i></div><div class="infoWTS"><div>'+empresa+'<span>online</span></div></div></header> <form action="<?=$urlSite?>" id="WTSForm" method="post" target="_blank"><input type="hidden" name="url" value="'+url_atual+'" /> <input type="hidden" name="idEnterprise" value="<?=$idEnterprise?>" /> <input type="text" name="name" placeholder="Nome" required> <input type="tel" name="whatsapp" placeholder="DDD + Número" required> <input type="email" name="mail" placeholder="E-mail" required> <textarea name="message" rows="3" placeholder="Sua Mensagem" required></textarea> <input type="submit" value="Enviar"> </form> </div></div>';

document.querySelector(".wtsIcon").onclick = function() {
    document.querySelector(".windowWTS").classList.toggle('visibility');
}
document.querySelector(".closeWTS").onclick = function() {
    document.querySelector(".windowWTS").classList.toggle('visibility');
}
document.querySelector("#WTSForm").addEventListener("submit",function(e) {
	e.preventDefault();
	document.querySelector("#WTSForm").submit();
})
<?php

    }
}


?>
}