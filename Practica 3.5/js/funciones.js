$(function() {
    $("#fecha").datepicker();
    $("#edad").spinner();
    
    $("#nota1").draggable();
    $("#nota2").draggable();
    $("#nota3").draggable();

    $("#tablero").droppable({
        drop: function(evento, ui) {
            switch (ui.helper.text().trim()) {
                case "Nota 1":
                    $("#seleccion").find("#1").html("Nota 1");
                    break;
                case "Nota 2":
                    $("#seleccion").find("#2").html("Nota 2");
                    break;
                case "Nota 3":
                    $("#seleccion").find("#3").html("Nota 3");
                    break;
            }
        }
    });

    $("#tablero").droppable({
        out: function(evento, ui) {
           switch (ui.helper.text().trim()) {
                case "Nota 1":
                    $("#seleccion").find("#1").html("");
                    break;
               case "Nota 2":
                    $("#seleccion").find("#2").html("");
                    break;
                case "Nota 3":
                    $("#seleccion").find("#3").html("");
                    break;
            }
        }
    });
    
    $("#contenido").accordion();
});