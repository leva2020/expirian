jQuery(document).ready(function() {

    var pathname = window.location.pathname;
    //console.log(pathname);
    if (pathname == '/ganar-laminas' || pathname == '/referidos' || pathname == '/canje' || pathname == '/trivia' || pathname == '/trivia-al-dia'  || pathname == '/gol-de-oro' || pathname == '/respuesta-gol-de-oro') {
        jQuery('#boton-referidos').removeClass('active');
        jQuery('#boton-pregunta').removeClass('active');
        jQuery('#boton-canje').removeClass('active');
        
        if(pathname == '/referidos'){
            jQuery('#boton-referidos').addClass('active');
        }        
        
        if(pathname == '/trivia'){
            jQuery('#boton-pregunta').addClass('active');
        }
        
        if(pathname == '/canje'){
            jQuery('#boton-canje').addClass('active');
        }
        
        jQuery('li[class*=menu-path-node] a').removeClass('active');
        jQuery('.menu-path-node-158 a').addClass('active');
    }
    else if (pathname == '/mis-laminas' || pathname == '/album' || pathname == '/node/19' || pathname == '/node/20' || pathname == '/node/109' || pathname == '/node/110' || pathname == '/node/111' || pathname == '/node/112' || pathname == '/node/113' || pathname == '/node/114' || pathname == '/node/115' || pathname == '/node/116' || pathname == '/node/117' || pathname == '/node/118' || pathname == '/node/119' || pathname == '/node/127') {
        
        jQuery('#boton-album').removeClass('active');
        jQuery('#boton-mis-laminas').removeClass('active');
        
        if(pathname == '/album' || pathname == '/node/19' || pathname == '/node/20' || pathname == '/node/109' || pathname == '/node/110' || pathname == '/node/111' || pathname == '/node/112' || pathname == '/node/113' || pathname == '/node/114' || pathname == '/node/115' || pathname == '/node/116' || pathname == '/node/117' || pathname == '/node/118' || pathname == '/node/119' || pathname == '/node/127'){
            jQuery('#boton-album').addClass('active');
        }
        
        if(pathname == '/mis-laminas'){
            jQuery('#boton-mis-laminas').addClass('active');
        }
        jQuery('li[class*=menu-path-node] a').removeClass('active');
        jQuery('.menu-path-node-157 a').addClass('active');
    }
    


    if (jQuery('.form-item-field-acepto-terminos-und label')) {
        jQuery('.form-item-field-acepto-terminos-und label').html('<a target="_blank" href="/terminos-y-condiciones">Acepto terminos y condiciones *</a>');
    }

    if (jQuery('#user-login-form')) {
        jQuery('#edit-name').attr('placeholder', 'Su e-mail Empresarial');
        jQuery('#edit-pass').attr('placeholder', 'Su contraseña');
    }

    jQuery(".multipage-link-next").click(function() {
        jQuery("#user-register-form #edit-actions").show();
    });

    jQuery(".multipage-link-previous").click(function() {
        jQuery("#user-register-form #edit-actions").hide();
    });

    jQuery('.mis-laminas').scroll(function() {
        if (jQuery('.mis-laminas').scrollTop() > 0) {
            jQuery('.boton-pegar-laminas').css('top', jQuery('.mis-laminas').scrollTop() + 495);
        }
    });

});

function clonar_campos_formulario_registro()
{
    var origen = document.getElementById('edit-field-e-mail-empresa-und-0-email').value;
    document.getElementById('edit-name').value = origen;
    document.getElementById('edit-mail').value = origen;
}

jQuery(document).ready(function() {
    jQuery(".contra").click(function(e) {
        e.preventDefault();
        jQuery("input").removeAttr('disabled');
        jQuery(".btn-contra").show();
        jQuery(".btn_aceptar").remove();
        jQuery(this).hide();
        jQuery(".laminas-canje form").addClass("form-contra");
    });
    jQuery("input[type=checkbox], input[type=radio]").uniform();

    jQuery('.cerrar_alerta').click(function() {
        jQuery('.messages.status').remove();
        jQuery('.messages-label.status').remove();
    });
});

function setCookie(cname, cvalue, exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}


function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++)
    {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return c;
}
