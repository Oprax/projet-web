/**
 * Created by Clemsouille on 18/04/2017.
 */
var i =0;
var img = 'image';
$(document).ready(function () {
    $('#addimage').click(function() {
        i += 1;
        var name = 'image'+i;
        $('#addimage').before("<div class=\"form-group\" id=\"img\"><input type=\"file\" name=\""+name+"\" size=\"40\"> </div>");
    });
    $('#delpanier').click(function() {


        var dtExpireDel = new Date();
        dtExpireDel.setTime(dtExpireDel.getTime() - 1);

        setCookie('basket', '', dtExpireDel, '/');
        alert('myCookie vaut : ' + getCookie('basket'));

        alert('ok');
    });

});

function setCookie(nom, valeur, expire, chemin, domaine, securite){
    document.cookie = nom + ' = ' + escape(valeur) + '  ' +
        ((expire == undefined) ? '' : ('; expires = ' + expire.toGMTString())) +
        ((chemin == undefined) ? '' : ('; path = ' + chemin)) +
        ((domaine == undefined) ? '' : ('; domain = ' + domaine)) +
        ((securite == true) ? '; secure' : '');
}
function getCookie(name){
    if(document.cookie.length == 0)
        return null;

    var regSepCookie = new RegExp('(; )', 'g');
    var cookies = document.cookie.split(regSepCookie);

    for(var i = 0; i < cookies.length; i++){
        var regInfo = new RegExp('=', 'g');
        var infos = cookies[i].split(regInfo);
        if(infos[0] == name){
            return unescape(infos[1]);
        }
    }
    return null;
}