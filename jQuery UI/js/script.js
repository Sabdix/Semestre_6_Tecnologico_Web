$(function() {
    $("h1").draggable();
    $("#fecha").datepicker();
    $("#bt1").button();
    $("#semestre").spinner();
    $("#bt2").button();
    $("#bt2").click(function() {
        $("#formulario").toggle('explode');
    });
    $("#dialogo").dialog({
        autoOpen: false
    });
    $("#encabezado").resizable();
    $("#bt1").click(function() {
        $("#dialogo").dialog('open');
    });
    $("#lista").sortable();
    $("#menu").menu();
    $("#formulario").droppable({
        drop: function(evento, ui) {
            $(this).addClass('ui-highlight').find("p").html("Se droppeo");
        }
    });
    $("#acordeon").accordion();
    $("#tabs").tabs();
});