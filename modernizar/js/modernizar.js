$(function () {
    if (!Modernizr.inputtypes.date)
        $("#fecha").datepicker();
    $("#boton").button();
    $("#boton").click(function() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(posicionar);
        } else {
            alert('Tu navegador no soporta geolocalización');
        }
    });
});

function posicionar(pos) {
    var latitud = pos.coords.latitude;
    var longitud = pos.coords.longitude;
    var url = "https://www.google.com.mx/maps/place/19%C2%B043'20.8%22N+101%C2%B011'07.4%22W/@"+latitud+","+longitud+",459m/data=!3m1!1e3!4m2!3m1!1s0x0:0x0";
    $("#mensaje").html("<img src="+url+"/>");
}