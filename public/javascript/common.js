$(document).ready(function(){
    $(".infoView").on('click', function()
    {
        var min = 1;
        var max = 6;

        var zufall = Math.floor(Math.random() * (max - min + 1)) + min;

        $("img.zufall").attr('src','/images/' + zufall + '.png')
    });

    $(".closeButton").on('click', function(){
        $('.featherlight-close').click();
    });

    $("#abmelden").on('click', function(){
        Cookies.remove('anzahl');
        Cookies.remove('benutzerId');
        window.location.href = '/anmelden/';
    });
});

