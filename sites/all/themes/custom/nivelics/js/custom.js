jQuery(document).ready(function(){
    if(jQuery('.form-item-field-acepto-terminos-und label')){
        jQuery('.form-item-field-acepto-terminos-und label').html('<a target="_blank" href="/terminos-y-condiciones">Acepto terminos y condiciones *</a>');
    }
    
    if(jQuery('#user-login-form')){
        jQuery('#edit-name').attr('placeholder','Su e-mail Empresarial');
        jQuery('#edit-pass').attr('placeholder','Su contraseña');
    }

    jQuery( ".multipage-link-next" ).click(function() {
      jQuery( "#user-register-form #edit-actions" ).show();
    });

    jQuery( ".multipage-link-previous" ).click(function() {
      jQuery( "#user-register-form #edit-actions" ).hide();
    });

    jQuery('.mis-laminas').scroll(function(){
        if(jQuery('.mis-laminas').scrollTop() > 0) {
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

jQuery(document).ready(function(){
    jQuery(".contra").click(function(e){
        e.preventDefault();
        jQuery("input").removeAttr('disabled');
        jQuery(".btn-contra").show();
        jQuery(".btn_aceptar").remove();
        jQuery(this).hide();
        jQuery(".laminas-canje form").addClass("form-contra");
    });
    jQuery("input[type=checkbox], input[type=radio]").uniform();

    jQuery('.cerrar_alerta').click(function(){
        jQuery('.messages.status').remove();
        jQuery('.messages-label.status').remove();
    });
});

function setCookie(cname,cvalue,exdays)
{
    var d = new Date();
    d.setTime(d.getTime()+(exdays));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}


function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) 
      {
      var c = ca[i].trim();
      if (c.indexOf(name)==0) return c.substring(name.length,c.length);
      }
    return c;
}
