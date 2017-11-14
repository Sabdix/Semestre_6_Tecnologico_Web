
window.addEventListener("load", main);

function main() {
    var boton = document.getElementById("boton");
    boton.addEventListener("click", operar);
    
}

function operar() {
    var i = -1;
    var x = document.getElementById("x").value;
    var y = document.getElementById("y").value;
    var w = document.getElementById("w").value;
    var z = document.getElementById("z").value;
    
    x = parseFloat(x);
    y = parseFloat(y);
    z = parseFloat(z);
    w = parseFloat(w);
    
    var numerador;
    var denominador;
    
    var Res = document.getElementById("Res");
    var operacion = document.getElementById("operacion");
    
    switch(operacion.selectedIndex){
        case 0:
            if ((x + z) < 0)
                Res.innerHTML = (w+y) + "" + (x+z) + "i";
            else
                Res.innerHTML = (w+y) + "+" + (x+z) + "i";
            break;
        case 1:
            if ((x - z) < 0)
                Res.innerHTML = (w-y) + "" + (x-z) + "i";
            else
                Res.innerHTML = (w-y) + "+" + (x-z) + "i";
            break;
        case 2:
            if ((w*z) + (x*y) < 0)
                Res.innerHTML = ((w*y)+(x*z)*i) + "" + ((w*z) + (x*y)) + "i";
            else
                Res.innerHTML = ((w*y)+(x*z)*i) + "+" + ((w*z) + (x*y)) + "i";
            break;
        case 3:
            if ((w*z) + (x*y) < 0)
                numerador = ((w*y)+(x*z)) + "" + ((w*z*i) + (x*y)) + "i";
            else
                numerador = ((w*y)+(x*z)) + "+" + ((w*z*i) + (x*y)) + "i";
            
            denominador = Math.pow(y,2) + Math.pow(z,2); 
            Res.innerHTML = numerador + "\n___________\n" + denominador;
            break;
    }
}