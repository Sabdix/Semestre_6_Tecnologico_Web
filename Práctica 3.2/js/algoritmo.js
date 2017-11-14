window.addEventListener("load",main);

function main () {

    document.getElementById("calcular").addEventListener("click", modulo);
}

function modulo() {
    var Referencia;
    var Movimiento = "0" + (document.getElementById("movimiento").selectedIndex + 1);
    var Consecutivo = document.getElementById("consecutivo").value;
    var zero = "";
    //Coloca Ceros al consecutivo
    for (i=0; i < (8 - Consecutivo.length); i++)
        zero += "0";
    Consecutivo = zero + Consecutivo;
    var Semestre = document.getElementById("semestre").value;
    //Se colocan ceros al Semstre
    zero = "";
    for (i=0; i < (2 - Semestre.length); i++)
        zero += "0";
    Semestre = zero + Semestre;
    //Calcula la Referencia
    Referencia = referencia(Movimiento, Consecutivo, Semestre);
    //Calcular Fecha condensada
    var Fcondensada = fechaCondensada(zero);
    //Calcular Monto Condensado
    var montoCondensado = montoC(zero);
    var Constante = document.getElementById("constante").selectedIndex;
    var digitoVerificador = digitoV(Referencia, Fcondensada, montoCondensado, Constante);
    var Resultado = document.getElementById("resultado");
    Resultado.innerHTML = Referencia + Fcondensada + montoCondensado + Constante + digitoVerificador;
}

function digitoV(R, F, M, C) {
    var RFMC = R + F + M + C;
    var suma = 0;
    
    for (i=0; i<RFMC.length; i++){
        switch (i % 5){
            case 0:
                suma += parseInt(RFMC.charAt(RFMC.length - i - 1)) * 11;
                break;
            case 1:
                suma += parseInt(RFMC.charAt(RFMC.length - i - 1)) * 13;
                break;
            case 2:
                suma += parseInt(RFMC.charAt(RFMC.length - i - 1)) * 17;
                break;
            case 3:
                suma += parseInt(RFMC.charAt(RFMC.length - i - 1)) * 19;
                break;
            case 4:
                suma += parseInt(RFMC.charAt(RFMC.length - i - 1)) * 23;
                break;
        }
    }
    suma = suma % 97;
    suma++;
    var DV = suma.toString();
    if (DV.length < 2)
        DV = "0" + DV;
    return DV;
}

function referencia(Movimiento, Consecutivo, Semestre) {
    return Movimiento + Consecutivo + Semestre;
}

function fechaCondensada(zero) {
    var fecha = document.getElementById("fecha").value;
    var Fecha = fecha.split("-"); 
    var dd = Fecha[2];
    var mm = Fecha[1];
    var yy = Fecha[0];
    //Se convierten a entero
    dd = parseInt(dd);
    mm = parseInt(mm);
    yy = parseInt(yy);

    var Fcondensada = ((yy-2014) * 372) + ((mm - 1) * 31) + (dd - 1);
    var FcondensadaC = Fcondensada.toString();
    //Coloca Ceros a Fconsensada
    zero = "";
    for (i=0; i < (4 - FcondensadaC.length); i++)
        zero += "0";
    FcondensadaC = zero + FcondensadaC;
    return FcondensadaC;
}

function montoC(zero) {
    var monto = document.getElementById("monto").value;
    zero = "";
    monto = monto.replace(".","");
    var n1;
    var n2;
    var n3;
    var suma = 0;
    for (i=0; i < (8 - monto.length); i++)
        zero += "0";
    monto = zero + monto;
    for (i=0; i < 8; i++){
        switch (i % 3) {
            case 0: // x7
                n1 = monto.charAt(monto.length - i - 1);
                n1 = parseInt(n1);
                suma += 7 * n1;
                break;
            case 1: // x3
                n2 = monto.charAt(monto.length - i - 1);
                n2 = parseInt(n2);
                suma += 3 * n2;
                break;
            case 2: // x1
                n3 = monto.charAt(monto.length - i - 1);
                n3 = parseInt(n3);
                suma += 1 * n3;
                break;
        }
    }
    if (suma < 10){
        return suma;
    } else {
        return suma % 10;
    }
}