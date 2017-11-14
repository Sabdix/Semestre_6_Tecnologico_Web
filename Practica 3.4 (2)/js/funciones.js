$(document).ready(function() {
    $("#datos").hide();
    $("#boton").click(function() {
        $("#datos").toggle();
    });
    
    $("#social").change(cargar);
});

function cargar() {
    var valor = $("#social").val();
    switch(valor) {
        case '1':
            alert('1');
            $("#Social").load("assets/facebook.html");
            break;
        case '2':
            alert('2');
            break;
        case '3':
            alert('3');
            break;
    }
}