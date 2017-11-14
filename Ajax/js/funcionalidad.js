//Manejo de Ajax Básico

$(document).ready(function() {
    $("#e1").click(enlace1);
    $("#e2").click(enlace2);
    $("#e3").click(enlace3);
});

function enlace1() {
    alert("Enlace 1");
    $("#lateral").load("assets/Archivo.txt");
}

function enlace2() {
    alert("Enlace 2");
    $("#lateral").load("assets/Archivo.txt");
}

function enlace3() {
    alert("Enalce 3");
    $("#lateral").load("assets/ejemplo.html");
}