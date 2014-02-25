// gestion des cookies
function createCookie(cookie_name, cookie_value, cookie_days) {
    if (cookie_days) {
        var cookie_date = new Date();
        cookie_date.setTime(cookie_date.getTime() + (cookie_days * 24 * 60 * 60 * 1000));
        var cookie_expires = "; expires=" + cookie_date.toGMTString();
    }
    else var cookie_expires = "";
    document.cookie = cookie_name + "=" + cookie_value + cookie_expires + "; path=/";
}

function readCookie(cookie_name) {
    var cookie_nameEQ = cookie_name + "=";
    var cookie_ca = document.cookie.split(';');
    for(var cookie_i = 0; cookie_i < cookie_ca.length; ++cookie_i) {
        var cookie_c = cookie_ca[cookie_i];
        while (cookie_c.charAt(0) == ' ') {
            cookie_c = cookie_c.substring(1, cookie_c.length);
        }
        if (cookie_c.indexOf(cookie_nameEQ) == 0) {
            return cookie_c.substring(cookie_nameEQ.length, cookie_c.length);
        }
    }
    return undefined;
}

function eraseCookie(cookie_name) {
    createCookie(cookie_name, "", -1);
}

// ajoute la fonction .unique() aux tableaux
Array.prototype.unique = function(a){
    return function() {
        return this.filter(a);
    }
} (function (a,b,c) {
    return (c.indexOf(a, b + 1) < 0);
});

