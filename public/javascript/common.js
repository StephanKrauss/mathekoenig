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
});

