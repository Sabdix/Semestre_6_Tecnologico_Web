//Manejo de Ajax Básico

$(document).ready(function() {
    $("#e1").click(enlace1);
    $("#e2").click(enlace2);
});

function enlace1() {
    alert("Enlace 1");
    $("#lateral").load("http://www.google.com.mx");
}

function enlace2() {
    alert("Enlace 2");
    $("#lateral").load("assets/Archivo");
}