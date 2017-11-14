function funcion() {
    //alert("Hola mundo!");
    var parrafo2;
    parrafo2 = document.getElementById("parrafo2");
    
    var nombre = window.prompt("Dame un nombre");
    parrafo2.innerHTML = "Tu nombre es: <b>" + nombre +"</b>";
}


window.addEventListener("load", main);

function main() {
    //alert("Bienvenidos");
    
    var itm;
    itm = document.getElementById("itm");
    itm.addEventListener("click", funcion);
    
    var e1 = document.getElementById("e1").addEventListener("click", cambiarEnlace);
    
    var encabezado = document.getElementById("encabezado").addEventListener("mouseover", pasarRaton);
    
    var op = document.getElementById("op").addEventListener("change", sumar);
}

function sumar() {
    var numero = document.getElementById("numero");
    numero = parseInt(numero.value);
    numero = Math.pow(numero, 3);
    alert("El resultado es "+ numero);
}

function pasarRaton() {
    alert("Hi!!!");
}

function cambiarEnlace() {
    var e2 = document.getElementById("e2");
    e2.innerHTML = "DSC";
    e2.href = "http://www.dsc.itmorelia.edu.mx/";
    
    var mensaje = document.getElementById("mensaje");
    mensaje.innerHTML = " Se cambio el enlace!!";
    mensaje.style = "background-color: red;";
    e2.setAttribute("style", "color: yellow;");
}

/* Ya no se usa
window.onload = function() {
    alert("Bienvenidos");
}
*/