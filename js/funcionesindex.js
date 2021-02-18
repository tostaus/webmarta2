$(document).ready(function() {
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
    var lasCookies = document.cookie;
    var contiene = "cookiewebmartarubio";
    if (lasCookies.indexOf(contiene) !== -1) {
        document.getElementById("barraaceptacion").style.display = "none";


    } else {
        PonerCookie();
    }
});

function QuitarCookie() {
    document.getElementById("barraaceptacion").style.display = "none";
    PonerCookie();

}

function PonerCookie() {
    document.cookie = "cookiewebmartarubio=true;";

}