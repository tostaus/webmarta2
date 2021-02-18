//cookies

// funcion para comprobar si tiene una cookie ya asignada
function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}
// funcion para fijar la cookie
function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}
//Mostramos la pantalla si no tiene la cookie, pero si la tiene la ocultamos
if (getCookie('tucookie') != "1") {
    document.getElementById("barraaceptacion").style.display = "block";
} else {
    document.getElementById("barraaceptacion").style.display = "none";
}

//funcion para llamar a la función setcookie y establecer los parámetros que deseamos
function PonerCookie() {
    setCookie('tucookie', '1', 365);
    document.getElementById("barraaceptacion").style.display = "none";
}

//fin cookies