$(document).ready(function() {
    $("#boton1").click(calcular);
    $("#boton2").click(function() {
        $("#resultado").html("");    
    });
});

function calcular () {
    var numero = document.getElementById("numero").value;
    var bandera = true;
    var bandera2 = false;
    var texto = "";
    var indices = [];
    
    for (I=0; I <= numero; I++) {
        indices[I] = 0;
    }
    
    
    if (numero > 99 | numero < 1) {
        $("#resultado").html("<h2>Ingresa número entre 1 y 99<h2>");
    } else {
        for (i=2; i <= Math.sqrt(numero); i++) {
            if (numero % i == 0) {
                bandera = false;
                break;
            }
        }
        if (bandera == true){
            $("#resultado").html("<h2>El número " + numero + " es primo<h2>");
            $("#resultado").css("background-color", "rgb(0,255,0)");
        } else {
            var OP = 2;
            while (OP <= numero) {
                if (numero % OP == 0) {
                    indices[OP]++;
                    bandera2 = true;
                    numero = numero / OP;
                } else {
                    if(bandera2 == true & OP < numero) {
                        texto += OP + "<sup>" + indices[OP] + "</sup>" + "*";
                        bandera2 = false;
                    } else {
                        if (OP == numero) {
                             texto += OP + "<sup>" + indices[OP] + "</sup>";
                        bandera2 = false;
                        }
                    }
                    OP++;
                }
            }
            if(bandera2 == true) {
                        texto += OP + "<sup>" + indices[OP] + "</sup>";
                        bandera2 = false;
                    }
            $("#resultado").html("<h2>" + texto + "</h2>");
            $("#resultado").css("background-color", "rgb(255,255,0)");
        }
    }
}
