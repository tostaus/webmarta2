$(document).ready(function() {
    // Para borrar cookies desmarcar esta linea
    //document.cookie = "cookiewebmartarubio=; max-age=0";
    // Comprobamos si sigue navegando con cualquier click
    $(document).on('click', 'body *', function() {
        /// Comprobamos si existe cookies
        var lasCookies = document.cookie;
        var contiene = "cookiewebmartarubio";
        if (lasCookies.indexOf(contiene) !== -1) {
            document.getElementById("barraaceptacion").style.display = "none"; // Si existe quitamos barra
            google();
        } else {
            QuitarCookie(); // si no quitamos barra y ponemos cookies
        }

    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    otro(); // No hace nada el usuario
});

function QuitarCookie() {


    document.getElementById("barraaceptacion").style.display = "none";
    PonerCookie();

}

function PonerCookie() {
    document.cookie = "cookiewebmartarubio=true;";
    google();

}

function otro() {
    var lasCookies = document.cookie;
    var contiene = "cookiewebmartarubio";
    if (lasCookies.indexOf(contiene) !== -1) {
        document.getElementById("barraaceptacion").style.display = "none";
        //alert(lasCookies);
        google()


    } else {
        document.getElementById("barraaceptacion").style.display = "block";
    }
}

function google() {
    window.dataLayer = window.dataLayer || [];

    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-HHHKH31DY4');
}