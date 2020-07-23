var element = document.querySelector('body')

var script = document.querySelector('#gerenciazap')

const license = script.getAttribute('license-key')

const owner = script.getAttribute('owner')

element.innerHTML = `<link rel="stylesheet" href="public/css/WTSthemebutton.css"><a href="#" class="wtsIcon"><span class="textNtWTS">Chamar no WhatsApp!</span><i class="notificationWTS">1</i><img src="public/img/whatsapp.svg" alt="WhatsApp"></a><div class="windowWTS"><div class="formWTS"><header><i class="closeWTS">x</i><div class="profileWTS"><img src="" alt=""><i class="onlineWTS"></i></div><div class="infoWTS"><div>${owner}<span>online</span></div></div></header><form action="#" target="_blank"><input type="text" name="name" placeholder="Nome" required><input type="tel" name="whatsapp" placeholder="DDD + Número" required><input type="email" name="mail" placeholder="E-mail" required><textarea name="message" rows="3" placeholder="Sua Mensagem" required></textarea><input type="submit" value="Enviar"></form></div></div>`


document.querySelector(".buttonWTS").onclick = function() {
    document.querySelector("#chatWTS").classList.add("fadeOut");
    document.querySelector(".formWTS input[name='name']").focus();
}
document.querySelector(".wtsIcon").onclick = function() {
    document.querySelector(".windowWTS").classList.toggle('visibility');
    document.querySelector(".windowWTS").style.animationDelay="0s";
}