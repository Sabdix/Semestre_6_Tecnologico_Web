/*Ejemplo de Manejo de jQuery*/

$(document).ready(function() {
    $("h1").click(function() {
        //$("#p1").hide();
        $("#p1").toggle();
        $("#p2").css("color", "red");
        $("#p3").text("Hola Mundo");
        var contenido = $("#p2").html();
        $("#p2").html(contenido + "<h2>" + $(this).text() + "</h2>");
    });
    $("input[type=range]").change(cambiarColor);
});

function cambiarColor() {
    var rojo = $("#rojo").val();
    var verde = $("#verde").val();
    var azul = $("#azul").val();
    
    var Rojo = parseInt(rojo);
    var Verde = parseInt(verde);
    var Azul = parseInt(azul);
    
    $("#colores").html("<h2>#"+ Rojo.toString(16) + "" + Verde.toString(16) +"" + Azul.toString(16) + "</h2>");
    $("#colores").css("background-color", "rgb("+rojo+","+verde+","+azul+")");
}