/*Ejemplo de Validaciones Javascript*/

function validar(){
    edad = prompt("Dame tu edad", "Pregunta");
    
    if(edad >= 18){
        //ocument.writeln("Eres mayor de Edad");
        alert('Eres mayor de edad');
    }
    else{
        //document.writeln("Eres menor de Edad");
        alert('Eres menor de edad');
    }
}

function cuadrado(numero){
    resultado = numero * numero;
    return resultado;
}

function invocarCuadrado(){
    num = window.prompt("Dame un número",0);
    num = parseFloat(num);
    res = cuadrado(num);
    alert("El resultado es "+res);
}