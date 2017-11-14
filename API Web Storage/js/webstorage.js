$(function() {
    $("#registro").show();
    $("#mensaje").hide();
    if(sessionStorage.getItem("usuario")) {
        $("#registro").hide();
        $("#mensaje").show();
    }

    $("#boton").click(function() {
        if(window.sessionStorage) {
            var usuario = $("#usuario").val();
            sessionStorage.setItem("usuario", usuario);
            
        } else {
            alert("Tu navegador no soporta Web Storage");
        }
    });
    
    $("#boton1").click(function() {
        sessionStorage.removeItem("usuario");    
    });
});